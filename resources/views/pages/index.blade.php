@extends('layouts.app')

@section ('content')
        
        <div class="jumbotron text-center">
                <div class="container">
                        <div class="row">      
                                <div class="col-sm-12">
                                        <div id="myslider" class="carousel slide" data-ride="carousel">
                                                <!-- indicators dot nav -->
                                                <ol class="carousel-indicators">
                                                       <li data-target="#myslider" data-slide-to="0" class="active"></li>
                                                       <li data-target="#myslider" data-slide-to="1"></li> 
                                                </ol>        
                                                <!-- wrapper for slides -->
                                                        <div class="carousel-inner" role="listbox">
                                                                <div class="item active">
                                                                        <img src="/storage/cover_image/petcare1.jpg" alt="Pet Care"/>
                                                                        <div class="carousel-caption">
                                                                                <h2 style="color:#C71585">One Stop Pet Care </h2>
                                                                        </div>
                                                                </div>
                                                                <div class="item">
                                                                        <img src="/storage/cover_image/petcare2.jpg" alt="Pet Care2"/>
                                                                        <div class="carousel-caption">
                                                                                <h2 style="color:#C71585">For all Pets</h2>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                <!-- controls or next and prev buttons -->
                                                <a  class="left carousel-control" href="#myslider" role="button" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#myslider"  role="button" data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                </a>

                                        </div>


                                        <h1>Welcome to Petcare </h1>
                                        <p>One stop petcare is specialize for your pets</p>
                                </div>
                        </div>
                        <hr style="border-top: 4px double #8c8b8b; text-align: center;">
                        
                        <div class = "col-sm-4 col-md-6">
                                <div class="panel-body">
                                        <div class = "thumbnail" style="border-radius:15px 50px 30px;">
                                                <a href="/products"><img src="/storage/cover_image/pet_food.jpg" alt="" style="max-height:250px;" class="img-rounded">
                                                <a  href="/products" class="btn btn-info" style="border-radius: 12px;">Our Products</a>
                                                </a>
                                        </div>
                                </div>
                        </div>
                        <br>
                        <div class="col-sm-6 col-md-5">
                                        <div class = "thumbnail" style="border-radius:15px 50px 30px;">
                                                <a href="/services"><img src="/storage/cover_image/pet_service.jpg" alt="" style="max-height:250px;" class="img-rounded">
                                                <a  href="/services" class="btn btn-info" style="border-radius: 12px;">Our Services</a>
                                                </a>
                                        </div>
                        </div>
                
                </div>        
        </div>

@endsection
