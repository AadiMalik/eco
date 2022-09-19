<?php
$data = content();
?>
@extends('user/layouts.main')
@section('content')
<!--slider area start-->
<div class="slider-area pos-rltv carosule-pagi cp-line" style="background: rgba(0, 0, 0, 0) url({{asset('images/bg/breadcumb3.jpg')}}) no-repeat scroll 0 0;">
    <div class="active-slider">
        @foreach ($slider as $item)
        <div class="single-slider pos-rltv">
            <div class="slider-img"><img src="{{asset('img/'.$item->image)}}" style="width:100%; height:800px;" alt=""></div>
            <div class="slider-content pos-abs">
                <h4>{{$item->title}}</h4>
                <h1 class="uppercase pos-rltv underline">{{$item->big_title}}</h1>
                <a href="{{url('shop')}}" class="btn-def btn-white">Shop Now</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!--slider area end-->
<!--Search start-->
<div class="delivery-service-area ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#search']['heading']}}</h5>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <form action="{{url('search')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-10">
                    <input type="text" name="search" required placeholder="Product,Price.. etc" style="height: 50px; border: 5px solid #cc3333; border-radius: 0px;" class="form-control">
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger form-control" style="height: 50px; border-radius: 0px;"><span class="fa fa-search"></span> SEARCH</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Search end-->
<!--delivery service start-->
<div class="delivery-service-area ptb-30">
    <div class="container">
        <div class="row">
            @foreach ($service as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-service shadow-box text-center">
                    <img src="{{asset('img/'.$item->image)}}" alt="">
                    <h5>{{$item->name}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--delivery service end-->

<!--branding-section-area start-->
<div class="branding-section-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="active-slider pos-rltv carosule-pagi cp-line pagi-02" style="height: 440px;">
                    @foreach ($productslider->take(3) as $item)
                    <div class="single-slider">
                        <div class="row">
                            <div class="col-lg-6    ">
                                <div class="brand-img text-center">
                                    @foreach ($productimage->where('product_id',$item->id)->take(1) as $item1)
                                    <img src="{{asset('img/'.$item1->image)}}" style="width:50%; height:440px;" alt="">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6    ">
                                <div class="brand-content ptb-55">
                                    <div class="brand-text color-lightgrey">
                                        @if($item->sale!=null)
                                        <h6>{{$item->sale}}</h6>
                                        @endif
                                        <h2 class="uppercase montserrat" class="heading-hidden">{{$item->name}}</h2>
                                        <h3 class="montserrat">Rs.{{number_format($item->price)}} <del style="color: #7b7878; font-size: 20px;">Rs.{{number_format($item->price)}}</del></h3>
                                        <!-- <p>It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout.</p> -->
                                        <div class="social-icon-wraper mt-35">
                                            <div class="social-icon">
                                                <ul>
                                                    <li><a href="#" style="cursor: pointer;" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}" tabindex="0"><i class="zmdi zmdi-eye"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--branding-section-area end-->

<!--new arrival area start-->
<div class="new-arrival-area pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#newarrival']['heading']}}</h5>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%;">
            <div class="col-lg-12" style="width: 100%;">
                <div class="total-new-arrival new-arrival-slider-active carsoule-btn row" style="width: 100%;">
                    @foreach ($product as $item)
                    <div class="col-lg-3" style="width: 100%;">
                        <!-- single product start-->
                        <div class="single-product" style="width: 100%;">

                            <div class="product-img" style="width: 100%;">
                                @if ($item->sale!=null)
                                <div class="product-label">
                                    <div class="new">{{$item->sale}}</div>
                                </div>
                                @endif
                                <div class="single-prodcut-img  product-overlay pos-rltv" style="width: 100%;">
                                    <a href="{{url('detail/'.$item->id)}}">
                                        @foreach ($productimage->where('product_id',$item->id)->take(2) as $loop=>$item1 )
                                        @if ($loop->first)
                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="primary-image">
                                        @endif
                                        @if ($loop->last)
                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="secondary-image">
                                        @endif
                                        @endforeach
                                    </a>
                                </div>
                                <div class="product-icon socile-icon-tooltip text-center">
                                    <ul>
                                        <li><a href="#" style="cursor: pointer;" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-text" style="width: 100%;">
                                <div class="prodcut-name"> <a href="{{url('detail/'.$item->id)}}" class="heading-hidden">{{$item->name}}</a>
                                </div>
                                <div class="prodcut-ratting-price">
                                    <div class="prodcut-price">
                                        <div class="new-price">Rs.{{number_format($item->price)}} @if($item->pre_price!=null)<del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</div>
                                    </div><br />
                                    <div class="prodcut-ratting">
                                        @if ($rating->where('product_id',$item->id)->count()==0)
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        @endif
                                        @foreach ($rating->where('product_id',$item->id)->take(1) as $item2)
                                        @if (ceil($item2->avg('rating')) < 1.5) <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>

                                            @elseif (ceil($item2->avg('rating')) < 2) <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                @elseif (ceil($item2->avg('rating')) < 2.5) <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                    @elseif (ceil($item2->avg('rating')) < 3) <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        @elseif (ceil($item2->avg('rating')) < 3.5) <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            @elseif (ceil($item2->avg('rating')) < 4) <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                @elseif (ceil($item2->avg('rating')) < 4.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    @elseif (ceil($item2->avg('rating')) < 5) <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                        @elseif (ceil($item2->avg('rating')) == 5)
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        @endif
                                                                        @endforeach
                                                                        <span style="font-size: 12px ;">({{$rating->where('product_id',$item->id)->count()}}) Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single product end-->
                    </div>


                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!--new arrival area end-->

<!--banner area start-->
<div class="banner-area pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="single-banner gray-bg">
                    <div class="sb-img text-center">
                        <img src="{{asset('img/'.$data['#banner1']['image'])}}" style="width:100%; height:400px;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-banner gray-bg">
                    <div class="sb-img text-center">
                        <img src="{{asset('img/'.$data['#banner2']['image'])}}" style="width:100%; height:400px;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner area end-->

<!--discunt-featured-onsale-area start -->
<div class="discunt-featured-onsale-area pt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-area tab-cars-style">
                    <div class="title-tab-product-category">
                        <div class="col-lg-12 text-center">
                            <ul class="nav mb-40 heading-style-2" role="tablist">
                                <li role="presentation"><a href="#newarrival" aria-controls="newarrival" role="tab" data-toggle="tab">{{$data['#tab1']['heading']}}</a>
                                </li>
                                <li role="presentation"><a class="active" href="#bestsellr" aria-controls="bestsellr" role="tab" data-toggle="tab">{{$data['#tab2']['heading']}}</a></li>
                                <li role="presentation"><a href="#specialoffer" aria-controls="specialoffer" role="tab" data-toggle="tab">{{$data['#tab3']['heading']}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content-tab-product-category">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in" id="newarrival">
                                <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                                    @foreach ($product as $item)
                                    <div class="col-lg-3" style="width: 100%;">

                                        <!-- single product start-->
                                        <div class="single-product" style="width: 100%;">
                                            <div class="product-img" style="width: 100%;">
                                                @if ($item->sale!=null)
                                                <div class="product-label">
                                                    <div class="new">{{$item->sale}}</div>
                                                </div>
                                                @endif
                                                <div class="single-prodcut-img  product-overlay pos-rltv" style="width: 100%;">
                                                    <a href="{{url('detail/'.$item->id)}}">
                                                        @foreach ($productimage->where('product_id',$item->id)->take(2) as $loop=>$item1 )
                                                        @if ($loop->first)
                                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="primary-image">
                                                        @endif
                                                        @if ($loop->last)
                                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="secondary-image">
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                </div>
                                                <div class="product-icon socile-icon-tooltip text-center">
                                                    <ul>
                                                        <li><a href="#" style="cursor: pointer;" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-text" style="width: 100%;">
                                                <div class="prodcut-name"> <a href="{{url('detail/'.$item->id)}}" class="heading-hidden">{{$item->name}}</a>
                                                </div>
                                                <div class="prodcut-ratting-price">
                                                    <div class="prodcut-price">
                                                        <div class="new-price">Rs.{{number_format($item->price)}} @if($item->pre_price!=null)<del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</div>
                                                    </div><br />
                                                    <div class="prodcut-ratting">
                                                        @if ($rating->where('product_id',$item->id)->count()==0)
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        @endif
                                                        @foreach ($rating->where('product_id',$item->id)->take(1) as $item2)
                                                        @if (ceil($item2->avg('rating')) < 1.5) <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>

                                                            @elseif (ceil($item2->avg('rating')) < 2) <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                @elseif (ceil($item2->avg('rating')) < 2.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    @elseif (ceil($item2->avg('rating')) < 3) <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        @elseif (ceil($item2->avg('rating')) < 3.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            @elseif (ceil($item2->avg('rating')) < 4) <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                @elseif (ceil($item2->avg('rating')) < 4.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                    @elseif (ceil($item2->avg('rating')) < 5)) <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                        @elseif (ceil($item2->avg('rating')) == 5)
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        @endif
                                                                                        @endforeach
                                                                                        <span style="font-size: 12px ;">({{$rating->where('product_id',$item->id)->count()}}) Reviews</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end-->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in active" id="bestsellr">
                                <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                                    @foreach ($bestproduct as $item)
                                    <div class="col-lg-3" style="width: 100%;">

                                        <!-- single product start-->
                                        <div class="single-product" style="width: 100%;">
                                            <div class="product-img" style="width: 100%;">
                                                @if ($item->sale!=null)
                                                <div class="product-label">
                                                    <div class="new">{{$item->sale}}</div>
                                                </div>
                                                @endif
                                                <div class="single-prodcut-img  product-overlay pos-rltv" style="width: 100%;">
                                                    <a href="{{url('detail/'.$item->id)}}">
                                                        @foreach ($productimage->where('product_id',$item->id)->take(2) as $loop=>$item1 )
                                                        @if ($loop->first)
                                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="primary-image">
                                                        @endif
                                                        @if ($loop->last)
                                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="secondary-image">
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                </div>
                                                <div class="product-icon socile-icon-tooltip text-center">
                                                    <ul>
                                                        <li><a href="#" style="cursor: pointer;" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-text" style="width: 100%;">
                                                <div class="prodcut-name"> <a href="{{url('detail/'.$item->id)}}" class="heading-hidden">{{$item->name}}</a>
                                                </div>
                                                <div class="prodcut-ratting-price">
                                                    <div class="prodcut-price">
                                                        <div class="new-price">Rs.{{number_format($item->price)}} @if($item->pre_price!=null)<del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</div>
                                                    </div><br />
                                                    <div class="prodcut-ratting">
                                                        @if ($rating->where('product_id',$item->id)->count()==0)
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        @endif
                                                        @foreach ($rating->where('product_id',$item->id)->take(1) as $item2)
                                                        @if (ceil($item2->avg('rating')) < 1.5) <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>

                                                            @elseif (ceil($item2->avg('rating')) < 2) <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                @elseif (ceil($item2->avg('rating')) < 2.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    @elseif (ceil($item2->avg('rating')) < 3) <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        @elseif (ceil($item2->avg('rating')) < 3.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            @elseif (ceil($item2->avg('rating')) < 4) <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                @elseif (ceil($item2->avg('rating')) < 4.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                    @elseif (ceil($item2->avg('rating')) < 5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                        @elseif (ceil($item2->avg('rating')) == 5)
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        @endif
                                                                                        @endforeach
                                                                                        <span style="font-size: 12px ;">({{$rating->where('product_id',$item->id)->count()}}) Reviews</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end-->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in" id="specialoffer">
                                <div class="total-new-arrival new-arrival-slider-active carsoule-btn row">
                                    @foreach ($offerproduct as $item)
                                    <div class="col-lg-3" style="width: 100%;">

                                        <!-- single product start-->
                                        <div class="single-product" style="width: 100%;">
                                            <div class="product-img" style="width: 100%;">
                                                @if ($item->sale!=null)
                                                <div class="product-label">
                                                    <div class="new">{{$item->sale}}</div>
                                                </div>
                                                @endif
                                                <div class="single-prodcut-img  product-overlay pos-rltv" style="width: 100%;">
                                                    <a href="{{url('detail/'.$item->id)}}">
                                                        @foreach ($productimage->where('product_id',$item->id)->take(2) as $loop=>$item1 )
                                                        @if ($loop->first)
                                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="primary-image">
                                                        @endif
                                                        @if ($loop->last)
                                                        <img alt="" src="{{asset('img/'.$item1->image)}}" style="width:100%; height:385px;" class="secondary-image">
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                </div>
                                                <div class="product-icon socile-icon-tooltip text-center">
                                                    <ul>
                                                        <li><a style="cursor: pointer;" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-text" style="width: 100%;">
                                                <div class="prodcut-name"> <a href="{{url('detail/'.$item->id)}}" class="heading-hidden">{{$item->name}}</a>
                                                </div>
                                                <div class="prodcut-ratting-price">
                                                    <div class="prodcut-price">
                                                        <div class="new-price">Rs.{{number_format($item->price)}} @if($item->pre_price!=null)<del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</div>
                                                    </div><br />
                                                    <div class="prodcut-ratting">
                                                        @if ($rating->where('product_id',$item->id)->count()==0)
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        @endif
                                                        @foreach ($rating->where('product_id',$item->id)->take(1) as $item2)
                                                        @if (ceil($item2->avg('rating')) < 1.5) <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>

                                                            @elseif (ceil($item2->avg('rating')) < 2) <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                @elseif (ceil($item2->avg('rating')) < 2.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    @elseif (ceil($item2->avg('rating')) < 3) <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        @elseif (ceil($item2->avg('rating')) < 3.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            @elseif (ceil($item2->avg('rating')) < 4) <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                @elseif (ceil($item2->avg('rating')) < 4.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                    @elseif (ceil($item2->avg('rating')) < 5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                        @elseif (ceil($item2->avg('rating')) == 5)
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        @endif
                                                                                        @endforeach
                                                                                        <span style="font-size: 12px ;">({{$rating->where('product_id',$item->id)->count()}}) Reviews</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single product end-->
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--discunt-featured-onsale-area end-->

<!--testimonial-area-start-->
<div class="testimonial-area overlay ptb-70 mt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title color-lightgrey mb-40 text-center">
                    <h5 class="uppercase">{{$data['#homecomment']['heading']}}</h5>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="total-testimonial active-slider carosule-pagi pagi-03">
                    @foreach ($comment->take(5) as $item)
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            @if ($item->user_name->image!=null)
                            <img src="{{asset('img/'.$item->user_name->image)}}" style="width:100%; height:125px;" alt="">
                            @else
                            <img src="images/team/testi-03.jpg" style="width:100%; height:125px;" alt="">
                            @endif
                        </div>
                        <div class="testimonial-content color-lightgrey">
                            <div class="name-degi pos-rltv">
                                <h5>{{$item->user_name->fname}} {{$item->user_name->lname}}</h5>
                                @if ($item->product_id!=null)
                                <p>Product</p>
                                @else
                                <p>Blog</p>
                                @endif
                            </div>
                            <div class="testi-text">
                                <p>{{$item->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--testimonial-area-end-->

<!--new-arrival on-sale Top-ratted area start-->
<div class="arrival-ratted-sale-area pt-70">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#section1']['heading']}}</h5>
                </div>
                <div class="ctg-slider-active">
                    <div class="single-ctg new-arrival-ctg">
                        @foreach ($product->take(2) as $item)
                        <div class="single-ctg-item">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-6">
                                    <div class="product-ctg-img pos-rltv product-overlay">
                                        @foreach ($productimage->where('product_id',$item->id)->take(1) as $item1)
                                        <a href="{{url('detail/'.$item->id)}}"><img src="{{asset('img/'.$item1->image)}}" style="height: 170px; width:100%" alt=""></a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6">
                                    <div class="product-ctg-content">
                                        <p class="heading-hidden">{{$item->name}}</p>
                                        <p class="font-bold">Rs.{{number_format($item->price)}} @if($item->pre_price!=null) <del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</p>
                                        <div class="social-icon socile-icon-style-1 mt-15">
                                            <ul>
                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}" tabindex="0"><i class="zmdi zmdi-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-ctg on-sale-ctg">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">{{$data['#section2']['heading']}}</h5>
                    </div>
                    <div class="ctg-slider-active">
                        <div class="single-ctg new-arrival-ctg">
                            @foreach ($bestproduct->take(2) as $item)
                            <div class="single-ctg-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-6">
                                        <div class="product-ctg-img pos-rltv product-overlay">
                                            @foreach ($productimage->where('product_id',$item->id)->take(1) as $item1)
                                            <a href="{{url('detail/'.$item->id)}}"><img src="{{asset('img/'.$item1->image)}}" style="height: 170px; width:100%" alt=""></a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6">
                                        <div class="product-ctg-content">
                                            <p style="width:100%;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{$item->name}}</p>
                                            <p class="font-bold">Rs.{{number_format($item->price)}} @if($item->pre_price!=null) <del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</p>
                                            <div class="social-icon socile-icon-style-1 mt-15">
                                                <ul>
                                                    <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}" tabindex="0"><i class="zmdi zmdi-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-ctg top-rated-ctg">
                    <div class="heading-title heading-style pos-rltv mb-50 text-center">
                        <h5 class="uppercase">{{$data['#section3']['heading']}}</h5>
                    </div>
                    <div class="ctg-slider-active">
                        <div class="single-ctg new-arrival-ctg">
                            @foreach ($priceproduct->take(2) as $item)
                            <div class="single-ctg-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-6">
                                        <div class="product-ctg-img pos-rltv product-overlay">
                                            @foreach ($productimage->where('product_id',$item->id)->take(1) as $item1)
                                            <a href="{{url('detail/'.$item->id)}}"><img src="{{asset('img/'.$item1->image)}}" style="height: 170px; width:100%" alt=""></a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6">
                                        <div class="product-ctg-content">
                                            <p style="width:100%;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{$item->name}}</p>
                                            <p class="font-bold">Rs.{{number_format($item->price)}}  @if($item->pre_price!=null)<del style="color: #7b7878; font-size:12px;">Rs.{{number_format($item->pre_price)}}</del>@endif</p>
                                            <div class="social-icon socile-icon-style-1 mt-15">
                                                <ul>
                                                    <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}" tabindex="0"><i class="zmdi zmdi-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--new-arrival on-sale Top-ratted area end-->

<!--brand area are start-->
<div class="brand-area ptb-60">
    <div class="container">
        <div class="row">
            @foreach ($brand as $item)
            <div class="col-lg-2">
                <div class="single-brand shadow-box"><a href="{{url('brand/'.$item->id)}}"><img src="{{asset('img/'.$item->image)}}" style="height: 70px; width:100%;" alt=""></a></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<!--brand area are start-->

<!--blog area are start-->
<div class="blog-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#homeblog']['heading']}}</h5>
                </div>
            </div>
            <div class="col-lg-12">
                <div class=" row">
                    <div class="col-md-4">
                        @foreach ($blog as $item)
                        <div class="single-blog">
                            <div class="blog-img pos-rltv product-overlay">
                                @if ($item->iamge!=null)
                                <a href="#"><img src="{{asset('img/'.$item->image)}}" style="width:100%; height:300px;" alt=""></a>
                                @else
                                <iframe style="width:100%; height:300px;" src="{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                            </div>
                            <div class="blog-content">
                                <div class="blog-title">
                                    <h5 class="uppercase font-bold"><a href="{{url('blogdetail/'.$item->id)}}" style="width:100%;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{$item->name}}</a></h5>
                                    <div class="like-comments-date">
                                        <ul>
                                            <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>{{count($comment->where('blog_id',$item->id))}} Comments</a>
                                            </li>
                                            <li class="blog-date"><a href="#"><i class="zmdi zmdi-calendar-alt"></i>{{$item->created_at}}</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog-text" style="height: 100px; overflow:hidden; width: 100%; text-align: justify;">
                                        <p>{!!$item->description!!}</p>
                                    </div>
                                    <a class="read-more montserrat" href="{{url('blogdetail/'.$item->id)}}">Read More</a>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog area are end-->
<!-- QUICKVIEW PRODUCT -->
@foreach ($product as $item)
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade product{{$item->id}}" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <div class="product-images">
                            <!--modal tab start-->
                            <div class="portfolio-thumbnil-area-2">
                                <div class="tab-content active-portfolio-area-2">
                                    @foreach ($productimage->where('product_id',$item->id)->take(1) as $item1)
                                    <div role="tabpanel" class="tab-pane active" id="view1">
                                        <div class="product-img">
                                            <a href="#"><img src="{{asset('img/'.$item1->image)}}" style="height: 400px; width:100%;" alt="" /></a>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="product-more-views-2">
                                    <div class="thumbnail-carousel-modal-2" data-tabs="tabs">
                                        @foreach ($productimage->where('product_id',$item->id)->take(4) as $item1)
                                        <a href="#view1" aria-controls="view1" data-toggle="tab"><img src="{{asset('img/'.$item1->image)}}" style="height: 100px; width:100%;" alt="" /></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--modal tab end-->
                        <!-- .product-images -->
                        <div class="product-info">
                            <h1>{{$item->name}}</h1>
                            <div class="price-box-3">
                                <div class="s-price-box"> <span class="new-price">Rs.{{number_format($item->price)}}</span> <span class="old-price">Rs.{{number_format($item->pre_price)}}</span> </div>
                            </div> <a href="{{url('detail/'.$item->id)}}" class="see-all">See all features</a>
                            <input type="hidden" id="product{{$item->id}}" value="{{$item->id}}">
                            <div class="quick-add-to-cart">
                                <ul>
                                    <li><a id="addcart{{$item->id}}" title="Add to Cart" style="width:160px; height:60px; line-height:50px; font-size:16px; font-weight:bold; cursor: pointer;color: #fff; padding: 5px;    border-radius: 20px 0px 0px 20px;" class="btn btn-danger" data-placement="left">Add Cart <i style="font-size: 25px;" class="fa fa-cart-plus"></i></a></li>
                                    <li><a id="addwish{{$item->id}}" title="Add to Wishlist" style="width:100%;  height:40px; cursor: pointer;color: #fff; font-size:16px; font-weight:bold; padding: 5px;    border-radius: 0px 20px 20px 0px;" class="btn btn-info">Add Wishlist <i style="font-size: 25px;" class="fa fa-heart-o"></i></a></li>
                                </ul>
                                <!-- <a class="single_add_to_cart_button" id="addcart{{$item->id}}" style="cursor: pointer;">Add to cart</a> -->

                            </div>
                            <div class="quick-desc" style="height: 145px; overflow: hidden; text-align: justify;">{!!$item->description!!}</div>
                            <div class="social-sharing-modal">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Fallow Us</h3>
                                    <ul class="social-icons-modal">
                                        @foreach ($link as $item)
                                        <li><a target="_blank" title="{{$item->name}}" href="{{$item->link}}" class="pinterest m-single-icon"><i class="{{$item->icon}}"></i></a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .product-info -->
                    </div>
                    <!-- .modal-product -->
                </div>
                <!-- .modal-body -->
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>
@endforeach
<!-- END QUICKVIEW PRODUCT -->

@endsection
@section('after-script')
<script>
    $(document).ready(function() {

        <?php
        foreach ($product as $item) {
        ?>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#addcart<?php echo $item->id; ?>').click(function() {
                <?php if (auth()->user() != null) { ?>
                    var pro_id<?php echo $item->id; ?> = parseInt($('#product<?php echo $item->id; ?>').val());
                    var qty = 1;
                    $.ajax({
                        type: 'POST',
                        url: "{{url('user/addcart')}}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            qty: qty,
                            product_id: pro_id<?php echo $item->id; ?>,
                            user_id: <?php echo  auth()->user()->id; ?>
                        },

                        success: function(data) {
                            alert(data.success);
                            location.reload();
                        }
                    });
                <?php } else { ?> alert('Please Login First!');
                <?php } ?>

            });
            $('#addwish<?php echo $item->id; ?>').click(function() {
                <?php if (auth()->user() != null) { ?>
                    var pro_id<?php echo $item->id; ?> = parseInt($('#product<?php echo $item->id; ?>').val());
                    $.ajax({
                        type: 'POST',
                        url: "{{url('user/wish')}}",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            product_id: pro_id<?php echo $item->id; ?>,
                            user_id: <?php echo auth()->user()->id; ?>
                        },

                        success: function(data) {
                            alert(data.success);
                            location.reload();
                        }
                    });
                <?php } else { ?>
                    alert('Please Login First!');
                <?php } ?>

            });


        <?php } ?>
    });
</script>
@endsection