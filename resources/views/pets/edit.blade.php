@extends('layouts.app')

@section('content')

    <h1>Edit Pet</h1>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        {!! Form::open(['action'=>['PetsController@update', $pet->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $pet->name, ['class' => 'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('type', 'Type')}}
            {{Form::text('type', $pet->type, ['class' => 'form-control', 'placeholder'=>'Type'])}}
        </div>
        <div class="form-group">
            {{Form::label('color', 'Color')}}
            {{Form::text('color', $pet->color, ['class' => 'form-control', 'placeholder'=>'Color'])}}
        </div>
        <div class="form-group">
                {{Form::file('pet_image')}}
            </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection
