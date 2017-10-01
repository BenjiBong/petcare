@extends('layouts.app')
<style>
.steps {
    margin-top: -41px;
    display: inline-block;
    float: right;
    font-size: 16px
}
.step {
    float: left;
    background: white;
    padding: 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 100px;
    position: relative
}
.step_line {
    margin: 0;
    width: 0;
    height: 0;
    border-left: 16px solid #fff;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    z-index: 1008;
    position: absolute;
    left: 99px;
    top: 1px
}
.step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 1006;
    position: absolute;
    left: 99px;
    top: -3px
}
.step_complete {
    background: #357ebd
}
.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #eee;
}
.step_line.step_complete {
    background: 0;
    border-left: 16px solid #357ebd
}
.step_thankyou {
    float: left;
    background: white;
    padding: 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 100px;
}
.step.check_step {
    margin-left: 5px;
}
</style>


@section('content')

<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>
        </div>
         <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
            </div>
    </div>
    <br>

            <div class="row cart-body">
            <form class="form-horizontal" method="post" id="checkout-form" action="{{route('checkout')}}">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  pull-right">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order
                        </div>
                        
                        @foreach($products as $product)
                        <div class="panel-body">
                            <div class="form-group">


                              <div class="col-sm-2 col-xs-2">
                                <img style="max-height:150px" class="img-responsive" src="/storage/product_image/{{$product['item']['product_image']}}" alt="">
                              </div>
                              <div class="col-sm-6 col-xs-6">
                                <strong>{{$product['item']['title']}}</strong>
                              </div>
                              <div class="col-xs-2">
                                  <strong>Quantity: </strong><span>{{$product['qty']}}</span>
                              </div>
                                <div class="col-sm-2 col-xs-2 text-right">
                                    <h6><span>RM{{$product['price']}}</span></h6>
                                </div>

                            </div>




                    </div>
                    @endforeach
                        <div class="panel-body">
                            <div class="form-group"><hr /></div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <strong>Order Total</strong>
                                            <div class="pull-right"><span>$</span><span>{{$totalPrice}}</span></div>
                                        </div>
                            </div>
                        </div>
                </div>


            </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                            <!--SHIPPING METHOD-->
                            <div class="panel panel-info">
                                <div class="panel-heading">Address</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Shipping Address</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Country:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" id="address-zip" class="form-control" name="country" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>First Name:</strong>
                                            <input type="text" id="address-zip" name="first_name" class="form-control" value="" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Last Name:</strong>
                                            <input type="text" id="address-zip"  name="last_name" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Address:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" id="address-zip"  name="address" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>City:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" id="address-zip" name="city" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>State:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" id="address-zip"  name="state" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                        <div class="col-md-12">
                                            <input type="text" id="address-zip"  name="zip_code" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Phone Number:</strong></div>
                                        <div class="col-md-12"><input type="text" id="address-zip"  name="phone_number" class="form-control" value="" /></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12"><strong>Email Address:</strong></div>
                                        <div class="col-md-12"><input type="email" id="address-zip"  name="email_address" class="form-control" value="" /></div>
                                    </div>
                                </div>
                            </div>

        </div>
        <!--Credit card METHOD-->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
            <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card Type:</strong></div>
                                <div class="col-md-12">
                                    <select for="card-type" id="card-type" name="card-type" class="form-control">
                                        <option value="5">Visa</option>
                                        <option value="6">MasterCard</option>
                                        <option value="7">American Express</option>
                                        <option value="8">Discover</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" id="card-number" class="form-control" name="car_number" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVC:</strong></div>
                                <div class="col-md-12"><input type="text" id="card-cvc" class="form-control" name="card-cvc" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="card-expiry-month" name="">
                                        <option value="">Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="card-expiry-year" name="">
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ csrf_field()}}
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
               
            </form> 
        </div>
    
</div>

@endsection


@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{URL::asset('js/checkout.js')}}"></script> 
@endsection