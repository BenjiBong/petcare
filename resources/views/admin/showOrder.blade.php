@extends('layouts.admin.app')

@section('content')
  <br>
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">

    <div class="col-lg-8 col-sm-6 col-xs-12">
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item list-group-item-dark"><strong>Date and time: {{$order->created_at}}<br>Payment ID: {{$order->payment_id}}<br>User: {{$order->user->name}}</strong></li>
          @foreach($order->cart->items as $item)

            <li class="list-group-item">
              <span class="badge">RM{{$item['price']}} </span>
              {{$item['item']['title']}} | {{$item['qty']}} Unit(s)</li>
            @endforeach
            <li class="list-group-item"><strong>Total Price: RM{{$order->cart->totalPrice}}</strong></li>
          </ul>

        </div>
    @endsection
