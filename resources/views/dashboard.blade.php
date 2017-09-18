@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                    <img src="/storage/profile_img/{{Auth::user()->profile_img}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h3>{{ Auth::user()->name }}'s Profile</h3>
                            {!! Form::open(['action'=>'DashboardController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <label>Update Profile Image</label>
                                    {{Form::file('profile_img')}}
                                    {{Form::submit('Submit', ['class'=>'pull-right btn btn-sm btn-primary'])}}
                            {!! Form::close() !!}

                            <br><br><hr>
                            <h4>{{ Auth::user()->name }}'s Pets</h4>
                            <br>
                                @if (count($pets) > 0)
                                    @foreach($pets as $pet)

                                        <div class = "col-sm-6 col-md-4">
                                            <div class = "thumbnail">
                                                <a href="/pets/{{$pet->id}}"><img src="/storage/pet_images/{{$pet->pet_image}}" alt="" style="max-height:250px; max-width:100%;" class="img-rounded">


                                                <div class = "caption">
                                                    <h4 class="card-title"><a href="/pets/{{$pet->id}}">{{$pet->name}}</a></h4>
                                                    <h5 class="card-text">Type :{{$pet->type}}</h5>
                                                    <h5 class="card-text">Color:{{$pet->color}}</h5>
                                                    <h5 class="card-text">Owner: {{$pet->user->name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                @else
                                    <p class="label label-warning">No pets found</p>
                                @endif

                    <a href="/pets/create" style="margin-left:90%;" class="pull-right btn btn-primary">Add Pet</a>
            </div>

        </div>
    </div>

</div>

@endsection
