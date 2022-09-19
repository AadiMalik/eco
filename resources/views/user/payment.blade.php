<?php
$data = content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#paymenttop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#paymenttop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#paymenttop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!-- Payment Area -->
<div class="frequently-area pt-70 pb-60">
    <div class="container">
        <h2 style="font-weight: bold; color:#cc3333;">{{$data['#paymentsupport']['heading']}}</h2>
        <div style="font-size:16px;">
        {!!$data['#paymentsupport']['description']!!}
        </div>
        <hr style="margin: 0px;" />
        <hr style="margin-top: 5px;" />
        @if (count($payment)!=0)
        @foreach ($payment as $item)
        <div class="row mt-10">
            <div class="col-md-8">
                <h3 style="font-weight: bold;">{{$item->heading}}</h3>
                <p>{!!$item->description!!}</p>
                <span>Note: After the payment, please be sure to confirm us using this form: <a style="color:#cc3333;" href="{{url('user/account')}}">Deposit Confirmation Form</a></span>
            </div>
            <div class="col-lg-4">
                @if ($item->image!=null)
                <img src="{{asset('img/'.$item->image)}}" style="width:100%; height:235px;" alt="">
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            
            </div>
        </div>
        <hr style="margin: 0px;"/>
        @endforeach
        @else
        <b>No Items Found</b>
        @endif
    </div>
</div>
<!--Payment Area End Here -->
@endsection