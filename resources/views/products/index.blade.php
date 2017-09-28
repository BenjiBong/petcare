@extends('layouts.app')

@section('content')
    <h1 class="pull-center">Pets Food</h1>
    <br>
    @if (count($products) > 0)
        @foreach($products as $product)

                    <div class = "col-sm-6 col-md-4">
                    <div class="panel-body">
                        <a href="/products/{{$product->id}}">
                        <div class = "thumbnail">
                            <a href="/products/{{$product->id}}"><img src="/storage/product_image/{{$product->product_image}}" alt="" style="max-height:250px" class="img-rounded">


                            <div class = "caption">
                                <h4 class="card-title"><a href="/products/{{$product->id}}">{{$product->title}}</a></h4>
                                <h5 class="card-text">SKU :{{$product->sku}}</h5>
                                <h5 class="card-text">Price :RM{{$product->price}}</h5>
                                    <div class="clearfix"><a href="{{route('product.addToCart', ['id' => $product->id])}}s" class="btn btn-default pull-right" role="button">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;Add Cart
                                        </a>
                                    </div>

                            </div>
                        </div>
                    </div>
                    </div>
                                @endforeach

                                    {{$products->links()}}
                                @else
                                    <p class="label label-warning">No products found</p>
                                @endif
                            <br>

@endsection
