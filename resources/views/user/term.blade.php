<?php
$data = content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#termtop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#termtop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#termtop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!-- Begin Frequently Area -->
<div class="frequently-area pt-70 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Begin Term & condition area -->
                <div class="frequently-accordion">
                    <div id="accordion">
                        @foreach ($term as $loop=> $item)
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
                <!--Term & condition area End Here -->
            </div>
        </div>
    </div>
</div>
<!--Frequently Area End Here -->
@endsection