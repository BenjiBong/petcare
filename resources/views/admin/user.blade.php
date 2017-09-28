@extends('layouts.admin.app')
@section('content')
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
    <div class="panel panel-default">
      <div class="panel-heading">User profile</div>
      <div class="panel-body">
        <img src="/storage/profile_img/{{$user->profile_img}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>User's Details</th>
                <td>{!!Form::open(['action' => ['AdminController@destroyUser', $user->id], 'method' => 'user', 'class' => 'pull-right' ])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete User', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
              </tr>
            </tbody>
          </table>
        </div>
                <hr>
                <h4>{{ $user->name }}'s Pets</h4>
                <br>
                @if (count($pets) > 0)
                  @foreach($pets as $pet)
                    <div class = "col-sm-6 col-md-4">
                      <div class = "thumbnail">
                        <img src="/storage/pet_images/{{$pet->pet_image}}" alt="" style="max-height:250px; max-width:100%;" class="img-rounded">
                          <div class = "caption">
                            <h4 class="card-title">Name: {{$pet->name}}</h4>
                            <h5 class="card-text">Type : {{$pet->type}}</h5>
                            <h5 class="card-text">Color: {{$pet->color}}</h5>
                            <h5 class="card-text">Owner: {{$pet->user->name}}</h5>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @else
                    <p class="label label-warning">No pets found</p>
                  @endif
                </div>
              </main>
            @endsection
