@extends('layouts.admin.app')


@section('content')
      <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
        <div class="panel panel-default" >
          <div class="panel-heading" id="admin-panel"><h3>Admin Dashboard</h3></div>
          <div class="panel-body">
            <img src="/storage/profile_img/{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h3>{{ Auth::user()->name }}'s Profile</h3>
            {!! Form::open(['action'=>'AdminController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <label>Update Profile Image</label>
            {{--Form to update profile image--}}
            {{Form::file('profile_img')}}
            {{Form::submit('Submit', ['class'=>'pull-right btn btn-sm btn-primary'])}}
            {!! Form::close() !!}
          </div>
        </div>
      </main>



@endsection
