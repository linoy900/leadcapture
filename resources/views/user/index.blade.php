@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <a  href="{{url('/home')}}" class="btn btn-success">Home</a>
</div>
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Category</td>
              <td>Description</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{$ticket->ticket_id}}</td>
                <td>{{$ticket->title}}</td>
                 <td>{{$ticket->category}}</td>
                <td>{{$ticket->description}}</td>
                <td><a  href="{{url('/edit/ticket/')}}/{{$ticket->ticket_id}}">Edit</a>
               <a  href="{{url('/edit/delete')}}" >Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>


{!! $tickets->render() !!}
</div>
<div>
@endsection