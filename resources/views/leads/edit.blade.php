@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <a  href="{{url('/home')}}" class="btn btn-default">Home</a>
    <a  href="{{url('/leads')}}" class="btn btn-default">All Leads</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

    <div class="row">
    <form method="post" >
        <div class="form-group">
             <label for="title">First Name:</label>
            <span >{{$leads[0]->first_name}} </span>
        </div>
        <div class="form-group">
             <label for="title">Last Name:</label>
            <span>{{$leads[0]->last_name}} </span>
        </div>
        <div class="form-group">
             <label for="title">Email:</label>
           <span>{{$leads[0]->email}} </span>
        </div>
        <div class="form-group">
             <label for="title">Phone:</label>
           <span>{{$leads[0]->phone}} </span>
        </div>

           
        <div class="form-group">
            <label for="description">Address:</label>
            <textarea readonly cols="3" rows="3" class="form-control" name="description">{{$leads[0]->address}}</textarea>
        </div>
         <div class="form-group">
                    <img src={{$image_url}} id="image_pic" height="500" width="800"/>
                </div>
        <!-- <button type="submit" class="btn btn-primary">Update</button> -->
        </form>
    </div>
</div>
@endsection