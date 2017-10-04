@extends('layouts.admin.app')

@section('content')
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
<div class="panel panel-default" >
  <div class="panel-heading" id="admin-panel"><h3>Orders</h3></div>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>User</th>
        </tr>
      </thead>
      <tbody>
        @if (count($orders) > 0)
          @foreach($orders as $order)
            <tr>
              <td><a href="orders/{{$order->id}}">{{$order->created_at}}</a></td>
              <td><a href="orders/{{$order->id}}">{{$order->user->name}}</a></td>
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
