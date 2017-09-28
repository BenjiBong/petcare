@extends('layouts.admin.app')

@section('content')
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
<div class="panel panel-default" >
  <div class="panel-heading" id="products-panel"><h3 style="display: inline;">Products</h3>
    <a href="/products/create" class="pull-right btn btn-primary">Add Product</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>SKU</th>
          <th>Name</th>
          <th>Price (RM)</th>
        </tr>
      </thead>
      <tbody>
        @if (count($products) > 0)
          @foreach($products as $product)
            <tr>
              <td><a href="products\{{$product->id}}">{{$product->sku}}</a></td>
              <td><a href="products\{{$product->id}}">{{$product->title}}</a></td>
              <td><a href="products\{{$product->id}}">{{$product->price}}</a></td>
              <td>{!!Form::open(['action' => ['AdminController@destroyProduct', $product->id], 'method' => 'user', 'class' => 'pull-right' ])!!}
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
