@extends('layouts.admin.app')

@section('content')
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">
<div class="panel panel-default" >
  <div class="panel-heading" id="admin-panel"><h3>Products</h3></div>
<div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>SKU</th>
          <th>Name</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        @if (count($products) > 0)
          @foreach($products as $product)
            <tr>
              <td>{{$product->sku}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->price}}</td>
              <td>{!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'user', 'class' => 'pull-right' ])!!}
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
