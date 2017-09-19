@extends('layouts.app')

@section('content')

    <h1>Edit Pet</h1>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        {!! Form::open(['action' => ['PetsController@update', $pet->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group required">
            {{Form::label('name', 'Name', ['class' => 'control-label'])}}
            {{Form::text('name', $pet->name, ['class' => 'form-control', 'placeholder'=>'Name', 'required' => 'required'])}}
        </div>
        <div class="form-group required">
            {{Form::label('type', 'Type', ['class' => 'control-label'])}}
            {{Form::text('type', $pet->type, ['class' => 'form-control', 'placeholder'=>'Type', 'required' => 'required'])}}
        </div>
        <div class="form-group required">
            {{Form::label('color', 'Color', ['class' => 'control-label'])}}
            {{Form::text('color', $pet->color, ['class' => 'form-control', 'placeholder'=>'Color', 'required' => 'required'])}}
        </div>
        <div class="form-group required">
                {{Form::file('pet_image')}}
            </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        <div class="form-group required">
          <label class='control-label'></label>Required.
        </div>
@endsection
