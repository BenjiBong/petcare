@extends('layouts.app')

@section('content')
    <h2>Shopping Cart</h2>
    <br>
    <div class="container">
    @if(Session::has('cart'))

    <div class="row">
        <table class="table table-hover table-condensed list-group-item">
    				<thead>
						<tr>
							<th colspan=2 style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:7%" class="text-center">Subtotal</th>

						</tr>
					</thead>

            @foreach($products as $product)
            <tbody>
              <td><img style="max-height:150px" class="img-responsive" src="/storage/product_image/{{$product['item']['product_image']}}" alt=""></td>
                        <td>{{$product['item']['title']}}&nbsp;&nbsp;</td>
                        <td><span class="label label-success">RM: {{$product['price']}}</span></td>
                        <td><span class="badge text-center">{{$product['qty']}}</span></td>
                        @endforeach
                        <td class="text-center"><strong>Total :RM {{$totalPrice}}</strong></td>
                    </tbody>

        </table>
        </div>
        <br>
        <div class="pull right">
            <a href="{{route('checkout')}}" type="button" class="btn btn-success pull-right">Checkout</a>
        </div>
    </div>

    @else

    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
    @endif
</div>
@endsection
