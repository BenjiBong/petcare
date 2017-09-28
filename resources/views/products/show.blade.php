@extends('layouts.app')

@section('content')
<br>
<div class=col-main>
    <div class="col-lg-4 col-sm-6 col-xs-12">
        <img style="max-height:750px" class="img-responsive" src="/storage/product_image/{{$products->product_image}}" alt="">
        <br><br>
    </div>
    <div class="col-lg-8 col-sm-6 col-xs-12">

        <div><h1>{{$products->title}}</h1></div>
        <div class="info-orther">
         <div><p>{!!$products->body!!}</p></div>
         <hr>
         <div><p>Price: RM{!!$products->price!!}</p></div>
         <hr>
         <div><p>SKU:{!!$products->sku!!}</p></div>
         <hr>
         <div><p>Stock:{!!$products->stock!!}</p></div>
        <hr>
        <div>
    </div>
            <a href="{{route('product.addToCart', ['id' => $products->id])}}" class="btn btn-default">
            <i class="fa fa-shopping-cart"></i>&nbsp;Add Cart
            </a>
            <a href="/products" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Go back</a>
            @if (Auth::user())
              @if (Auth::user()->getTable() == 'admins')
            {!!Form::open(['action' => ['ProductsController@destroy', $products->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}
            {!!Form::close()!!}
            <a href="/products/{{$products->id}}/edit" class="btn pull-right btn-primary">
            <i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;Edit
            </a>
          @endif
        @endif

            <br><br>

</div>
@endsection
