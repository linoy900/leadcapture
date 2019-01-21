<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
 use Illuminate\Database\Query\Builder;
use Illuminate\pagination;
use View;
use App\Leads;
class LeadsController extends Controller
{
    	public function create()
	{
		return View::make('leads.create');
  	}
  	
  
    /**
     * Trf uploading function
     *
     * @param  array $request
     * @return image name and size
     */
    public function uploadFile(Request $request)
    {   
        try {
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);

            if ($validator->fails()) {
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            }

            $extension = $request->file('file')->getClientOriginalExtension();
            
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $dir = env('FOOTAGE_UPLOAD');
            $request->file('file')->move($dir, $filename);
            return response()->json(['status' => 'success', 'data' =>env('FOOTAGE_UPLOAD').$filename,'message' => 'File uploaded successfully' ]);
            
        } catch (\Exception $e) {die($e->getMessage());

             return response()->json(['status' => 'failure', 'data' => '' ,'message' => $e->getMessage()]);

        }
    }

    /**
     * unlink function
     *
     * @param  array $request
     * @return image name and size
     */
    public function fileUnlink(Request $request)
    {   
        try {
            
            $validation = $this->validate($request, [
                 'image' => 'required'
                ]);
            
            $destinationPath = str_replace("public","",getcwd()).env('FOOTAGE_UPLOAD');
            $fileName = $this->fileUpload($request, $destinationPath);

             //return the new image link
             $newFilePath['trf_image_path'] = env("SITE_URL").env('TRF_UPLOAD').$fileName;
             $newFilePath['size'] = $_FILES['image']['size'];
             $newFilePath['trf_image'] =$fileName;
             return response()->json(['status' => 'success', 'data' => $newFilePath ,'message' => 					'File uploaded successfully' ]);

        } catch (Exception $e) {

             return response()->json(['status' => 'failure', 'data' => '' ,'message' => $e->getMessage()]);

        }
    }
    /**
     * save leads function
     *
     * @param  array $request
     * @return image name and size
     */
    public function store(Request $request)
    {   
        try {
            $data = $this->validate($request, [
            'first_name'=>'required',
            'email'=> 'required'
        ]);
            $leads = new Leads();
            $leads->first_name = $request->input()['first_name'];
            $leads->last_name = $request->input()['last_name'];
            $leads->email = $request->input()['email'];
            $leads->phone = $request->input()['phone'];
            $leads->address = $request->input()['address']; 
            $leads->submit_status = isset($request->input()['submit_status'])?0:1;
            $leads->footage =$request->input()['image_path'];
            $leads->save();
             return redirect('create/leads')->with('success', 'New leads has been created');
        } catch (Exception $e) {
            return false;
            
        }

    }

    /**
     * Display a listing of the leads.
     *
     * @return \Illuminate\Http\Response
     */
    public function leadsList()
    {
        $userId= auth()->user()->id;
        $leads = Leads::select('leads_id','first_name','last_name','email','phone')
                ->orderBy('first_name','asc')
                ->paginate(7);
        return view('leads.index',compact('leads'));
    }

     /**
     * fetch a leads.
     *@param int $id
     * @return array
     */
      public function editLeads($id)
    {
        $leads = Leads::select('leads_id','first_name','last_name','email','phone','footage',
            'address')
            ->where('leads_id', $id)->get();
        return View::make('leads.edit')->with(['leads'=>$leads,
        			'image_url'=>env('SITE_URL').$leads[0]->footage]);
    }
    /** save the form automatically

    */
    public function autoSubmit(Request $request)
    {  
        try {
            $data = $this->validate($request, [
            'first_name'=>'required',
            'email'=> 'required']);
            
            $leads = new Leads();
            $leads->first_name = $request->input()['first_name'];
            $leads->last_name = $request->input()['last_name'];
            $leads->email = $request->input()['email'];
            $leads->phone = $request->input()['phone'];
            $leads->address = $request->input()['address']; 
            $leads->submit_status =0;
            $leads->footage =$request->input()['image_path'];
            $leads->save(); 
        }
        catch (Exception $e) {
            return false;
        }    
    
    }
}
