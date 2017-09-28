@extends('layouts.admin.app')

@section('content')
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
<div class="panel panel-default" >
  <div class="panel-heading" id="admin-panel"><h3>Users</h3></div>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @if (count($users) > 0)
          @foreach($users as $user)
            <tr>
              <td><a href="users/{{$user->id}}">{{$user->id}}</a></td>
              <td><a href="users/{{$user->id}}">{{$user->name}}</a></td>
              <td><a href="users/{{$user->id}}">{{$user->email}}</a></td>
              <td>{!!Form::open(['action' => ['AdminController@destroyUser', $user->id], 'method' => 'user', 'class' => 'pull-right' ])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
              {!!Form::close()!!}</td>
            </tr>
          @endforeach
        </tbody>
      @else
      @endif
    </table>
  </div>
</div>
</main>
@endsection
