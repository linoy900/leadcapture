@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <a  href="{{url('/home')}}" class="btn btn-success">Home</a>
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
    <form method="post" action="{{url('/edit/ticket/')}}/{{$tickets[0]->ticket_id}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Ticket Title:</label>
            <input type="text" class="form-control" name="title" value={{$tickets[0]->title}} />
        </div>
             <div class="form-group">
            <label for="category">Category:</label>
            <select name="category">

            @foreach ($categories as $category)
                <option value={{$category['category_id']}} 
                @if($tickets[0]->category_id==$category['category_id']) selected @endif >{{$category['category']}}</option>
            @endforeach
       
                
            </select>
        </div>
        <div class="form-group">
            <label for="description">Ticket Description:</label>
            <textarea cols="5" rows="5" class="form-control" name="description">{{$tickets[0]->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection