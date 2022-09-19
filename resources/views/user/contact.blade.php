<?php
$media = media();
$data = content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#contactustop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#contactustop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">$data['#contactustop']['heading']</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--map area start-->
<div class="map-area">
    <div id="map"></div>
</div>
<!--map area end-->

<!--contact info are start-->
<div class="contact-info ptb-70">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contact-form" class="row" action="{{url('contact')}}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="name" class="info" placeholder="Name*" type="text">
                                    {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="email" class="info" placeholder="Email*" type="email">
                                    {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="phone" class="info" placeholder="Phone*" type="text">
                                    {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box mb-20">
                                    <input name="subject" class="info" class="area-tex" placeholder="Subject*" type="text">
                                    {!!$errors->first("subject", "<span class='text-danger'>:message</span>")!!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-box mb-20">
                                    <textarea name="message" class="area-tex" placeholder="Your Message*"></textarea>
                                    {!!$errors->first("message", "<span class='text-danger'>:message</span>")!!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-box" style=" text-align:center;">
                                    <button class="btn btn-danger"  type="submit" style="font-size:16px; font-weight:bold;"><span class="fa fa-send"></span> Send</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-footer contact-us contact-us-2">
                    <div class="heading-title text-center mb-50">
                        <h5 class="uppercase">{{$data['#contactus']['heading']}}</h5>
                    </div>
                    <ul class="contact-info">
                        <li>
                            <div class="contact-icon"> <i class="{{$data['#phone']['icon']}}"></i> </div>
                            <div class="contact-text">
                                <p style="margin-top:0px;"><span>{!!$data['#phone']['description']!!}</span></p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"> <i class="{{$data['#email']['icon']}}"></i> </div>
                            <div class="contact-text">
                                <p style="margin-top:0px;"><span><a href="email:">{!!$data['#email']['description']!!}</a></span></p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon"> <i class="{{$data['#location']['icon']}}"></i> </div>
                            <div class="contact-text">
                                <p style="margin-top:0px;">{!!$data['#location']['description']!!}</p>
                            </div>
                        </li>
                    </ul>
                    <div class="social-icon-wraper mt-25">
                        <div class="social-icon socile-icon-style-1">
                            <ul>
                                @foreach ($media as $item)
                                <li><a href="{{$item->link}}" title="{{$item->name}}"><i class="{{$item->icon}}"></i></a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="pos-rltv">
                    <div class="contact-des">
                        <p>{!!$data['#contactusfooter']['description']!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--contact info are end-->
@endsection
@section('after-script')
<script>
    $(".alert").delay(5000).slideUp(300);
</script>
@endsection