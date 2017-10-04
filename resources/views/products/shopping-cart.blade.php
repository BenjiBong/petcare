@extends('layouts.app')
@section('content')
<h2>Shopping Cart</h2>
<br>
<div class="container">
    @if(Session::has('cart'))
    <form class="form-horizontal" method="post" id="checkout-form" action="/payment/add-funds/paypal">
        <div class="row">
            <table class="table table-hover table-condensed list-group-item">
                <thead>
                    <tr>
                        <th colspan=2 style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:7%" class="text-center">Subtotal</th>
                        <th style="width:7%" class="text-center"></th>

                    </tr>
                </thead>

                @foreach($products as $product)
                <tbody>
                    <td><img style="max-height:150px" class="img-responsive" src="/storage/product_image/{{$product['item']['product_image']}}" alt=""></td>
                    <td>{{$product['item']['title']}}&nbsp;&nbsp;</td>
                    <td><span class="label label-info">RM: {{$product['item']['price']}}</span></td>
                    <td><span class="badge text-center">{{$product['qty']}}</span></td>
                    <td><span class="label label-warning">RM: {{$product['price']}}</span></td>
                   <td><a href="{{route('product.removeFromCart', ['id' => $product['item']['id']])}}" class="btn btn-danger">
                    Remove
                    </a></td>

                    @endforeach


                </tbody>

<tr  ><td colspan=6 class="text-center"><div class="pull-right"><h4><strong>Total :RM {{$totalPrice}}</strong></h4></div></td></tr>
            </table>
        </div>
        <br>
        <div class="form-group">
            <div class="col-md-12">
                <input type="hidden" id="amount" class="form-control" name="amount" value="" />
                <input type="hidden" name="amount" value="{{$totalPrice}}">
                <input type="hidden" name="currency_code" value="MYR">
            </div>
            <div class="pull right">
                {{ csrf_field()}}
                <button type="submit" class="btn btn-success pull-right">Checkout</button>
            </div>
        </div>
    </form>
    @else

    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
    @endif
</div>
@endsection @section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
