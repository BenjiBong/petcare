@extends('layouts.app')

@section('content')
<br>
<div class=col-main>
    <div class="col-lg-5 col-sm-6 col-xs-12">
        <img style="max-height:750px" class="img-responsive" src="/storage/product_image/{{$products->product_image}}" alt="">
        <br><br>
    </div>
    <div class="col-lg-7 col-sm-6 col-xs-12">
   
        <div><h1>{{$products->title}}</h1></div>
        <div class="info-orther">
         <div><p>{!!$products->body!!}</p></div>
         <hr>
         <div><p>Price: RM{!!$products->price!!}</p></div>
         <hr>
         <div><p>SKU:{!!$products->sku!!}</p></div>
         <hr>
         <div><p>Stock:{!!$products->stock!!}</p></div>
       <small>Created at: {{$products->created_at}}</small><br>
        <small>Last updated: {{$products->updated_at}}</small>
        <hr>
        <div>
    </div>


            <a href="/products/{{$products->id}}/edit" class="btn btn-default">
            <i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;Edit
            </a>

            <a href="{{route('product.addToCart', ['id' => $products->id])}}" class="btn btn-default">
            <i class="fa fa-shopping-cart"></i>&nbsp;Add Cart
            </a>
        
            {!!Form::open(['action' => ['ProductsController@destroy', $products->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}
            {!!Form::close()!!}
            <a href="/products" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Go back</a>
            <br><br>

</div>
@endsection
