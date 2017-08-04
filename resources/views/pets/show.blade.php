@extends('layouts.app')

@section('content')

    <a href="/pets" class="btn btn-default">Go back</a>
    <br>
    <br>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <img style="width:100%" src="/storage/pet_images/{{$pet->pet_image}}" alt="">
      </div>

    </div>
    <h1>{{$pet->name}}</h1>
    <div><p>Type: {{$pet->type}}</p></div>
    <div><p>Color: {{$pet->color}}</p></div>
    <div><p>Owner: {{$pet->user->name}}</p></div>

         <hr>
       <small>Created at: {{$pet->created_at}}</small><br>
        <small>Last updated: {{$pet->updated_at}}</small>
        <hr>
        <a href="/pets/{{$pet->id}}/edit" class="btn btn-default">Edit</a>

        {!!Form::open(['action' => ['PetsController@destroy', $pet->id], 'method' => 'pet', 'class' => 'pull-right' ])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        <br>
        <br>
@endsection
