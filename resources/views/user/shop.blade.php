<?php
$media = media();
$data = content();
$menu = menu();
$macro_menu = macro_menu();
$micro_menu = micro_menu();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#productstop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#productstop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#productstop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--shop main area are start-->
<div class="shop-main-area grid-view_area ptb-70">
    <div class="container">
        <div class="row">
            <!--main-shop-product start-->
            <div class="col-lg-9 col-md-8 order-lg-2 order-md-2 order-1">
                <div class="shop-wraper">
                    <div class="col-lg-12">
                        <div class="shop-area-top">
                            <div class="row">
                                <div class="col-xl-3 col-lg-12 col-md-12">
                                    <div class="list-grid-view text-center">
                                        <ul class="nav" role="tablist">
                                            <li role="presentation"><a class="active" href="#grid" aria-controls="grid" role="tab" data-toggle="tab"><i class="zmdi zmdi-widgets"></i></a>
                                            </li>
                                            <li role="presentation"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <div class="shop-total-product-area clearfix mt-35">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--tab grid are start-->
                                <div role="tabpanel" class="tab-pane fade show active" id="grid">
                                    <div class="total-shop-product-grid row">
                                        @foreach ($product as $item)
                                        <div class="col-lg-4 col-md-6 item" style="width: 100%;">
                                            <!-- single product start-->
                                            <div class="single-product" style="width: 100%;">
                                                <input type="hidden" id="product{{$item->id}}" value="{{$item->id}}">
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
                                                            <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>
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
                                <!--shop grid are end-->

                                <!--shop product list start-->
                                <div role="tabpanel" class="tab-pane fade" id="list">
                                    <div class="total-shop-product-list row">
                                        @foreach ($product as $item)

                                        <div class="col-lg-12 item">
                                            <!-- single product start-->
                                            <div class="single-product single-product-list">
                                                <input type="hidden" id="product{{$item->id}}" value="{{$item->id}}">
                                                <div class="product-img">
                                                    <div class="product-label red">
                                                        @if($item->sale!=null)
                                                        <div class="new">{{$item->sale}}</div>
                                                        @endif
                                                    </div>
                                                    <div class="single-prodcut-img  product-overlay pos-rltv">
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
                                                </div>
                                                <div class="product-text prodcut-text-list fix">
                                                    <div class="prodcut-name list-name montserrat"> <a href="{{url('detail/'.$item->id)}}" class="heading-hidden">{{$item->name}}</a>
                                                    </div>
                                                    <div class="prodcut-ratting-price">
                                                        <div class="prodcut-ratting list-ratting">
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
                                                                                            <span style="font-size: 14px ;">({{$rating->where('product_id',$item->id)->count()}}) Reviews</span>
                                                        </div>
                                                        <div class="prodcut-price list-price">
                                                            <div class="new-price">Rs.{{number_format($item->price)}} </div>
                                                            @if($item->pre_price!=null)
                                                            <div class="old-price"> <del>Rs.{{number_format($item->pre_price)}}</del> </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="list-product-content" style="height: 75px; overflow: hidden;">
                                                        {!!$item->description!!}
                                                    </div>
                                                    <div class="social-icon-wraper mt-25">
                                                        <div class="social-icon socile-icon-style-1">
                                                            <ul>
                                                                <li><a href="#" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single product end-->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--shop product list end-->

                                <!--pagination start-->
                                <div class="col-lg-12">
                                    <div class="pagination-btn text-center">
                                        <ul class="page-numbers">
                                            {{$product->links()}}
                                        </ul>
                                    </div>
                                </div>
                                <!--pagination end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--main-shop-product start-->

            <!--shop sidebar start-->
            <div class="col-lg-3 col-md-4 order-lg-1 order-md-1 order-2">
                <div class="shop-sidebar">
                    <!--single aside start-->
                    <aside class="single-aside catagories-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#productcategory']['heading']}}</h5>
                        </div>
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                @foreach ($menu as $item)
                                <li class="closed"><a href="{{url('shop')}}">{{$item->name}}</a>
                                    <ul>
                                        @foreach ($macro_menu->where('menu_id',$item->id) as $item1)
                                        @foreach ($micro_menu->where('macro_menu_id',$item1->id) as $item2)
                                        <li>
                                            <a href="{{url('category/'.$item2->id)}}" style="cursor: pointer;">{{$item2->name}}</a>
                                        </li>
                                        @endforeach
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li class="closed"><a href="{{url('shop')}}">Others</a></li>
                            </ul>
                        </div>
                    </aside>
                    <!--single aside end-->


                    <!--single aside start-->
                    <aside class="single-aside color-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#productcolor']['heading']}}</h5>
                        </div>
                        <ul class="color-filter mt-30">
                            @foreach ($colors as $item)
                            <li><a href="{{url('color/'.$item->id)}}" style="background-color: {{$item->name}};" class="color-1"></a></li>
                            @endforeach

                        </ul>
                    </aside>
                    <!--single aside end-->

                    <!--single aside start-->
                    <aside class="single-aside size-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#productsize']['heading']}}</h5>
                        </div>
                        <ul class="size-filter mt-30">
                            @foreach ($sizes as $item)
                            <li><a href="{{url('size/'.$item->id)}}" class="size-s">{{$item->name}}</a></li>
                            @endforeach

                        </ul>
                    </aside>

                    <!--single aside start-->
                    <aside class="single-aside tag-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#producttag']['heading']}}</h5>
                        </div>
                        <ul class="tag-filter mt-30">
                            @foreach ($tag as $item)
                            <li><a href="{{url('category/'.$item->sale)}}">{{$item->sale}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <!--single aside end-->

                    <!--single aside start-->
                    <aside class="single-aside product-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#productrecent']['heading']}}</h5>
                        </div>
                        <div class="recent-prodcut-wraper">
                            <div class="single-rectnt-slider">
                                <!-- single product start-->
                                @foreach ($product->take(5) as $item)
                                <div class="single-product recent-single-product">
                                    <div class="single-rectnt-slider">
                                        <div class="product-img">
                                            <div class="single-prodcut-img  product-overlay pos-rltv">
                                                @foreach ($productimage->where('product_id',$item->id)->take(2) as $loop=> $item1)
                                                <a href="{{url('detail/'.$item->id)}}">
                                                    @if ($loop->first)
                                                    <img alt="" src="{{asset('img/'.$item1->image)}}" style="width: 100%; height:100px;" class="primary-image">
                                                    @endif
                                                    @if ($loop->last)
                                                    <img alt="" src="{{asset('img/'.$item1->image)}}" style="width: 100%; height:100px;" class="secondary-image">
                                                    @endif
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product-text">
                                            <div class="prodcut-name"> <a href="{{url('detail/'.$item->id)}}" class="heading-hidden">{{$item->name}}</a> </div>
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
                                                    @if ($item2->avg('rating') < 1.5) <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>

                                                        @elseif ($item2->avg('rating') < 2) <a href="#"><i class="fa fa-star"></i></a>
                                                            <a href="#"><i class="fa fa-star-half"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                            @elseif ($item2->avg('rating') < 2.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                @elseif ($item2->avg('rating') < 3) <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-half"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    @elseif ($item2->avg('rating') < 3.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        @elseif ($item2->avg('rating') < 4) <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                            <a href="#"><i class="fa fa-star-half"></i></a>
                                                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                                                            @elseif ($item2->avg('rating') < 4.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                @elseif ($item2->avg('rating') < 5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                    @elseif ($item2->avg('rating') == 5)
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                                    @endif
                                                                                    @endforeach
                                                                                    <span style="font-size: 12px ;">({{$rating->where('product_id',$item->id)->count()}}) Reviews</span>
                                                </div>
                                                <div class="prodcut-price">
                                                    <div class="new-price"> {{number_format($item->price)}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single product end-->
                                @endforeach
                            </div>
                        </div>

                    </aside>
                    <!--single aside end-->

                    <!--single aside start-->
                    <aside class="single-aside add-aside">
                        <a href="{{url('shop')}}"><img src="{{asset('img/'.$data['#productbanner']['image'])}}" style="height: 320px; width:100%;" alt=""></a>
                    </aside>
                    <!--single aside end-->
                </div>
            </div>
            <!--shop sidebar end-->
        </div>
    </div>
</div>
<!--shop main area are end-->
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
                <?php } else { ?>
                    alert('Please Login First!');
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