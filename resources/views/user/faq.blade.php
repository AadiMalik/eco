<?php
$data=content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#faqtop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#faqtop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#faqtop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!-- Begin Frequently Area -->
<div class="frequently-area pt-70 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="frequently-content">
                    <div class="frequently-desc">
                        <h3>Below are frequently asked questions, you may find the answer for yourself</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id erat sagittis,
                            faucibus metus malesuada, eleifend turpis. Mauris semper augue id nisl aliquet, a
                            porta lectus mattis. Nulla at tortor augue. In eget enim diam. Donec gravida tortor
                            sem, ac fermentum nibh rutrum sit amet. Nulla convallis mauris vitae congue
                            consequat. Donec interdum nunc purus, vitae vulputate arcu fringilla quis. Vivamus
                            iaculis euismod dui.</p>
                    </div>
                </div> -->
                <!-- Begin Frequently Accordin -->
                <div class="frequently-accordion">
                    <div id="accordion">
                        @foreach ($faq as $loop=> $item)
                        <div class="card @if($loop->first) actives @endif">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <a class="" data-toggle="collapse" data-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        {{$item->heading}}
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne{{$item->id}}" class="collapse @if($loop->first) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    {!!$item->description!!}
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
                <!--Frequently Accordin End Here -->
            </div>
        </div>
    </div>
</div>
<!--Frequently Area End Here -->
@endsection