<?php
$data=content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area  overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#aboutustop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#aboutustop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#aboutustop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!-- about-us-area start-->
<div class="about-us-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#aboutus']['heading']}}</h5>
                </div>
            </div>
            <div class="about-us-wrap row">
                <div class="col-lg-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($aboutslider as $loop => $item)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img class="d-block w-100" src="{{asset('img/'.$item->image)}}" style="width:100%; height:300px;" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-des">
                        <p>{!!$data['#aboutus']['description']!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-us-area end-->

<!--choose us area start-->
<div class="choose-us-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#whychoose']['heading']}}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single-choose text-center">
                    <div class="choose-icon pos-rltv">
                        <i class="{{$data['#why1']['icon']}}"></i>
                    </div>
                    <div class="choose-title">
                        <h5>{{$data['#why1']['heading']}}</h5>
                    </div>
                    <div class="choose-des">
                        <p>{!!$data['#why1']['description']!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single-choose text-center">
                    <div class="choose-icon pos-rltv">
                        <i class="{{$data['#why2']['icon']}}"></i>
                    </div>
                    <div class="choose-title">
                        <h5>{{$data['#why2']['heading']}}</h5>
                    </div>
                    <div class="choose-des">
                        <p>{!!$data['#why2']['description']!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="single-choose text-center">
                    <div class="choose-icon pos-rltv">
                        <i class="{{$data['#why3']['icon']}}"></i>
                    </div>
                    <div class="choose-title">
                        <h5>{{$data['#why3']['heading']}}</h5>
                    </div>
                    <div class="choose-des">
                        <p>{!!$data['#why3']['description']!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-md-none d-block d-lg-block">
                <div class="single-choose text-center">
                    <div class="choose-icon pos-rltv">
                        <i class="{{$data['#why4']['icon']}}"></i>
                    </div>
                    <div class="choose-title">
                        <h5>{{$data['#why4']['heading']}}</h5>
                    </div>
                    <div class="choose-des">
                        <p>{!!$data['#why4']['description']!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--choose us area end-->


<!--out team area start-->
<div class="our-team-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#team']['heading']}}</h5>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="total-team row">
                    @foreach ($team as $item)
                    <div class="col-lg-3 mt-10">
                        <!-- single team start-->
                        <div class="single-product single-member">
                            <div class="product-img">
                                <div class="single-prodcut-img  product-overlay pos-rltv">
                                    <a href="#"> <img alt="" src="{{asset('img/'.$item->image)}}" style="width:100%; height:300px;"></a>
                                </div>
                                <div class="product-icon socile-icon-tooltip text-center">
                                    <ul>
                                        <li><a href="{{$item->facebook}}" target="_blank" data-tooltip="Facebook" class="add-cart" data-placement="left"><i class="zmdi zmdi-facebook"></i></a>
                                        </li>
                                        <li><a href="{{$item->twitter}}" target="_blank" data-tooltip="Twitter" class="w-list"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a href="{{$item->gmail}}" target="_blank" data-tooltip="Google" class="cpare"><i class="zmdi zmdi-google"></i></a>
                                        </li>
                                        <li><a href="{{$item->instagram}}" target="_blank" data-tooltip="Instagram" class="cpare"><i class="zmdi zmdi-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="member-info">
                                    <h5>{{$item->name}}</h5>
                                    <p>{{$item->profession}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- single team end-->
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--out team area end-->
@endsection