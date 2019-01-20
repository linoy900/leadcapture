<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\User;
use View;
class UserController extends Controller
{
    public function create()
	{
   		return view('staff.create');
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userregister(Request $request)
    {
        
        $data = $this->validate($request, [
            'name'=>'required',
            'email'=> 'required'
        ]);
        $staff = new User();
        $staff->name =$request->input()['name'];
        $staff->email = $request->input()['email'];
        $staff->password = bcrypt($request->input()['password']);
       
        $staff->save();
        return redirect('/home')->with('success', 'New user has been created');
    }
    public function userlist(Request $request)
    {
           DB::enableQueryLog();

        $users = User::select('id','name','email')
        ->where('id','<>', auth()->user()->id)
        	->where('status', 1)->paginate(2);
			// ->simplepaginate(4);
			
 	return View::make('staff.index')->with(['users'=>$users]);
        // return  view('staff.index',compact('users'));
    }

     public function editprofile($id)
    {
        DB::enableQueryLog();
      
        $users = User::select('id','name','email')
        	->where('id', $id)
        	->where('status', 1)->get();
			// ->simplepaginate(4);
			
 	return View::make('staff.edit')->with(['users'=>$users]);
        // return  view('user.index',compact('tickets'));
    }
    
      public function updateprofile(request $request,$id)
    {
        DB::enableQueryLog();
          $staff = new User();
         $data = $this->validate($request, [
            'name'=>'required',
            'email'=> 'required'
        ]);
         // $staff = new User;
         $staff = User::find($id);
        $staff->name =$request->input()['name'];
        $staff->email = $request->input()['email'];
         $staff->id = $id;
         // die(print_r(json_decode($staff,true)));
        $staff->save();
			
 	return redirect('/user-list')->with('success', 'User has been updated!');
        // return  view('user.index',compact('tickets'));
    }
}
