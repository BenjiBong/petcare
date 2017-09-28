@extends('layouts.admin.app')

@section('content')
  <br>
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
    <div class="col-lg-4 col-sm-6 col-xs-12">
      <img style="max-height:750px" class="img-responsive" src="/storage/product_image/{{$product->product_image}}" alt="">
      <br><br>
    </div>
    <div class="col-lg-8 col-sm-6 col-xs-12">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th colspan=2>Product Details{!!Form::open(['action' => ['AdminController@destroyProduct', $product->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}
              {!!Form::close()!!}
              <a href="/products/{{$product->id}}/edit" class="btn pull-right btn-primary">
                <i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;Edit
              </a></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>Name</th>
              <td>{{$product->title}}</td>
            </tr>
            <tr>
              <th>Price</th>
              <td>{{$product->price}}</td>
            </tr>
            <tr>
              <th>SKU</th>
              <td>{{$product->sku}}</td>
            </tr>
            <tr>
              <th>Description</th>
              <td>{!!$product->body!!}</td>
            </tr>
            <tr>
              <th>Stock</th>
              <td>{{$product->stock}}</td>
            </tr>
            <tr>
              <th>Created at</th>
              <td>{{$product->created_at}}</td>
            </tr>
            <tr>
              <th>Updated at</th>
              <td>{{$product->updated_at}}</td>
            </tr>
    @endsection
