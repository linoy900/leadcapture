@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashbossdard</div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{session('status') }}
                           
                        </div>

                    @endif

                    You are logged in!
                </div>

            </div>
                 <div class="row">
                     <a  href="{{url('/create/ticket')}}" class="btn btn-success">Create Ticket</a>
                    <a href="{{url('/tickets')}}"  class="btn btn-default">All Tickets</a>
                     @if (Auth::user()->name =='Linoy')
                     <a href="{{url('/create/user')}}",  class="btn btn-default">New User</a>
                   @endif
                   
                   
                      </div>
            
           
            

        </div>
    </div>
</div>
@endsection
