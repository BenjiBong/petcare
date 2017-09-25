@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                    <div class="panel-body">
                    <img src="/storage/profile_img/{{Auth::user()->profile_img}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h3>{{ Auth::user()->name }}'s Profile</h3>
                            {!! Form::open(['action'=>'DashboardController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <label>Update Profile Image</label>
                                    {{Form::file('profile_img')}}
                                    {{Form::submit('Submit', ['class'=>'pull-right btn btn-sm btn-primary'])}}
                            {!! Form::close() !!}

                            
            </div>

        </div>
    </div>

</div>

@endsection
