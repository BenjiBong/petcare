@extends('layouts.app')

@section ('content')
       <h1>Services</h1>
<br>
    
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="carousel slide" data-ride="carousel" id="myslider2" >
                            <!-- indicators dot nav -->
                            <ol class="carousel-indicators">
                                <li data-target="#myslider2" data-slide-to="0" class="active"></li>
                                <li data-target="#myslider2" data-slide-to="1"></li>
                                <li data-target="#myslider2" data-slide-to="2"></li> 
                                <li data-target="#myslider2" data-slide-to="3"></li>
                            </ol>   

                            <!-- wrapper for slides -->
                            <div class="carousel-inner" role="list-box" style= "height:360px;">
                                <div class="item active">
                                    <img src="/storage/cover_image/cat_groom.jpg" alt="Cat Grooming"/>
                                    <div class="carousel-caption">
                                        <h2>Grooming With Us</h2>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="/storage/cover_image/dog_groom.jpg" alt="Dog Grooming"/>
                                        <div class="carousel-caption">
                                        </div>
                                </div>
                                <div class="item">
                                    <img src="/storage/cover_image/cat_bath.jpg" alt="Cat Bath"/>
                                    <div class="carousel-caption">
                                        <h2>Perfect Bubble Bath With Us</h2>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="/storage/cover_image/dog_bath.jpg" alt="Dog Bath"/>
                                    <div class="carousel-caption">
                                        <h2>With a Perfect Shampoo</h2>
                                    </div>
                                </div>
                            </div>
                             <!-- controls or next and prev buttons -->
                             <a  class="left carousel-control" href="#myslider2" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myslider2"  role="button" data-slide="next">
                                 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                             </a>
                        </div>
                    </div>
                </div>
            </div>
       
@endsection