@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <a  href="{{url('/home')}}" class="btn btn-success">Home</a>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
              
              <td>First Name</td>
              <td>Last Name</td>
              <td>Email</td>
              <td>Phone</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
            <tr>
                <td>{{$lead->first_name}}</td>
                 <td>{{$lead->last_name}}</td>
                <td>{{$lead->email}}</td>
                <td>{{$lead->phone}}</td>
                <td><a  href="{{url('/edit/leads/')}}/{{$lead->leads_id}}">View</a>
               
            </tr>
            @endforeach
        </tbody>
    </table>
<div>


{!! $leads->render() !!}
</div>
<div>
@endsection