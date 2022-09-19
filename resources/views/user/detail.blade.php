<?php
$data = content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#detailtop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#detailtop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#detailtop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--single-protfolio-area are start-->
<div class="single-protfolio-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="portfolio-thumbnil-area">
                    <div class="product-more-views">
                        <div class="tab_thumbnail" data-tabs="tabs">
                            <div class="thumbnail-carousel">
                                <ul class="nav">
                                    @foreach ($productimage->where('product_id',$detail->id) as $loop=> $item)
                                    <li>
                                        <a @if ($loop->first) class="active" @endif href="#view{{$item->id}}" class="shadow-box" aria-controls="view{{$item->id}}" data-toggle="tab">
                                            <img src="{{asset('img/'.$item->image)}}" alt="" />
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content active-portfolio-area pos-rltv">
                        <div class="social-tag">
                            <a href="#"><i class="zmdi zmdi-share"></i></a>
                        </div>
                        @foreach ($productimage->where('product_id',$detail->id) as $loop=> $item)
                        <div role="tabpanel" class="tab-pane @if($loop->first) active @endif" id="view{{$item->id}}">
                            <div class="product-img">
                                <a class="fancybox" data-fancybox-group="group" href="{{asset('img/'.$item->image)}}">
                                    <img src="{{asset('img/'.$item->image)}}" style="height: 550px" alt="" /></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="single-product-description">
                    <div class="sp-top-des">
                        <h3 style="font-weight: bold;">{{$detail->name}}</h3>
                        <h5 style="color:red;">{{$detail->brand_name->name}}</h5>
                        <div class="prodcut-ratting-price">
                            <div class="prodcut-ratting">
                                @if ($rating->where('product_id',$detail->id)->count()==0)

                                <a href="#"><i class="fa fa-star-o"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
                                <a href="#"><i class="fa fa-star-o"></i></a>
                                <span style="font-size: 16px;">(0)</span>
                                @endif
                                @foreach ($rating->where('product_id',$detail->id)->take(1) as $item2)
                                @if (ceil($item2->avg('rating')) < 1.5) <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                    <span style="font-size: 16px;"> ({{ceil($item2->avg('rating'))}})</span>
                                    @elseif (ceil($item2->avg('rating')) < 2) <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                            @elseif (ceil($item2->avg('rating')) < 2.5) <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                    @elseif (ceil($item2->avg('rating')) < 3) <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                        <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                            @elseif (ceil($item2->avg('rating')) < 3.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                                    @elseif (ceil($item2->avg('rating')) < 4) <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                                        <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                                            @elseif (ceil($item2->avg('rating')) < 4.5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star"></i></a>
                                                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                                                <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                                                    @elseif (ceil($item2->avg('rating')) < 5) <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                                                        <a href="#"><i class="fa fa-star-half"></i></a>
                                                                                        <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                                                            @elseif (ceil($item2->avg('rating')) == 5)
                                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                                            <a href="#"><i class="fa fa-star"></i></a>
                                                                                            <span style="font-size: 16px;">({{ceil($item2->avg('rating'))}})</i>
                                                                                                @endif
                                                                                                @endforeach
                            </div>
                            <div class="prodcut-price">
                                <div class="new-price"> {{number_format($detail->price)}} </div>
                                @if ($detail->pre_price!=null)
                                <div class="old-price"> <del>{{number_format($detail->pre_price)}}</del> </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- <div class="sp-des">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                    </div> -->
                    <form action="{{url('user/detail/{id}')}}" method="POST">
                        @csrf
                        <div class="sp-bottom-des">
                            <div class="single-product-option">
                                <div class="sort product-type">
                                    <div class="row">
                                        @if (count($productcolor->where('product_id',$detail->id))!=0)
                                        <div class="col-lg-2"><b><label for="">Colors:</label></b></div>
                                        @endif
                                        @foreach ($productcolor->where('product_id',$detail->id) as $item)
                                        <div class="col-lg-1 col-md-2 col-sm-4">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <span class="selectgroup-button"> <i style="color: {{$item->color_name->name}}; font-size:25px;" class="fa fa-stop"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        @if (count($productsize->where('product_id',$detail->id))!=0)
                                        <div class="col-lg-2"><b><label for="">Sizes:</label></b></div>
                                        @endif
                                        @foreach ($productsize->where('product_id',$detail->id) as $item)
                                        <div class="col-lg-1 col-md-2 col-sm-4">
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <span class="btn-danger" style="padding: 3px;"> <i>{{$item->size_name->name}}</i></span>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    @if (count($productcolor->where('product_id',$detail->id)) !=0 || count($productsize->where('product_id',$detail->id))!=0)
                                    <label style="color:red;">Select Your Favourite.</label style="color:red;">
                                    @endif
                                    <table style="width: 100%;">
                                    <tbody style="width: 100%;">
                                    @for ($i=1; $i<=$detail->pair;$i++)
                                            <tr style="width: 100%;">
                                                @if (count($productcolor->where('product_id',$detail->id)) !=0)
                                                <td style="width:10%;">
                                                    <label>Color({{$i}}): </label>
                                                </td>
                                                <td style="width:40%;">
                                                    <select name="color[]" style="width:100%; border-color: #888888;">
                                                        @foreach ($productcolor->where('product_id',$detail->id) as $item)
                                                        <option style="background:{{$item->color_name->name}};" value="{{$item->color_name->name}}">{{$item->color_name->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {!!$errors->first("color", "<span class='text-danger'>:message</span>")!!}
                                                </td>
                                                @endif
                                                @if (count($productsize->where('product_id',$detail->id)) !=0)
                                                <td style="width:10%;">
                                                    <label>Size({{$i}}): </label>
                                                </td>
                                                <td style="width:40%;">
                                                    <select name="size[]" style="width:100%; border-color: #888888;">
                                                        @foreach ($productsize->where('product_id',$detail->id) as $item)
                                                        <option value="{{$item->size_name->name}}">{{$item->size_name->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {!!$errors->first("size", "<span class='text-danger'>:message</span>")!!}
                                                </td>
                                                @endif
                                            </tr>
                                            @endfor
                                    </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                            <!-- <div class="quantity-area">
                            <table>
                                <tr>
                                    <td style="width:60px;">
                                        <label>Qty: </label>
                                    </td>
                                    <td>
                                        <div class="cart-quantity">
                                            <form action="#" method="POST" id="myform">
                                                <div class="product-qty">
                                                    <div class="cart-quantity">
                                                        <div class="cart-plus-minus">
                                                            <div class="dec qtybutton">-</div>
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            <div class="inc qtybutton">+</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div> -->
                            <div class="social-icon socile-icon-style-1">
                                <ul>
                                    <li>
                                        <input type="hidden" name="product_id" value="{{$detail->id}}">
                                        <button data-tooltip="Add To Cart" class="btn btn-danger add-cart add-cart-text" data-placement="left" tabindex="0">Add To Cart <i class="fa fa-cart-plus"></i></button>
                                    </li>

                    </form>
                    <form action="{{url('user/detailwish/'.$detail->id)}}" method="POST">
                        @csrf
                        <li><button title="Wishlist" class="btn btn-danger w-list" tabindex="0"><i class="fa fa-heart-o"></i></button></li>
                    </form>
                    <li><button title="Quick View" class="btn btn-danger q-view" data-toggle="modal" data-target=".product{{$detail->id}}" tabindex="0"><i class="fa fa-eye"></i></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!--single-protfolio-area are start-->

<!--descripton-area start -->
<div class="descripton-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-area tab-cars-style">
                    <div class="title-tab-product-category row">
                        <div class="col-lg-12 text-center">
                            <ul class="nav mb-40 heading-style-2" role="tablist">
                                <li role="presentation"><a class="active" href="#newarrival" aria-controls="newarrival" role="tab" data-toggle="tab">{{$data['#detailtab1']['heading']}}</a></li>
                                <li role="presentation"><a href="#bestsellr" aria-controls="bestsellr" role="tab" data-toggle="tab">{{$data['#detailtab2']['heading']}}({{count($comment->where('product_id',$detail->id))}})</a></li>
                                <li role="presentation"><a href="#specialoffer" aria-controls="specialoffer" role="tab" data-toggle="tab">{{$data['#detailtab3']['heading']}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12">
                        <div class="content-tab-product-category">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fix fade  show active" id="newarrival">
                                    <div class="review-wraper">
                                        {!!$detail->description!!}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fix fade in" id="bestsellr">
                                    <div class="review-wraper">
                                        <div class="comments-area fix mt-20">
                                            <h5 class="uppercase sb-title">{{$data['#detailcomment']['heading']}}</h5>
                                            <div class="comments-body" style="max-height: 300px; overflow-y: auto;">
                                                <ul>
                                                    @if (count($comment->where('product_id',$detail->id))==0)
                                                    <li style="text-align: center;">No Comments</li>
                                                    @else
                                                    @foreach ($comment->where('product_id',$detail->id) as $item)
                                                    <li class="signle-comments">
                                                        @if ($item->user_name->image!=null)
                                                        <img src="{{asset('img/'.$item->user_name->image)}}" style="width:70px; height:70px;" alt="">
                                                        @else
                                                        <img src="{{asset('images/blog/demo.jpg')}}" style="width:70px; height:70px;" alt="">
                                                        @endif
                                                        <div class="commets-text">
                                                            <h5>{{$item->user_name->fname}} {{$item->user_name->lname}}</h5>
                                                            <span>{{$item->created_at}}</span>
                                                            <div class="prodcut-ratting">
                                                                @for ($i=1; $i <= $item->rating; $i++)
                                                                    <a href="#"><i style="color:#cc3333;" class="fa fa-star"></i></a>
                                                                    @endfor
                                                                    @for ($i=1; $i <= (5-(int)$item->rating); $i++)
                                                                        <a href="#"><i style="color:#444444;" class="fa fa-star"></i></a>
                                                                        @endfor
                                                            </div>
                                                            <p>{{$item->description}}</p>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <hr style="margin: 20px 0;" />
                                        <div class="leave-through-area clearfix mt-40">
                                            <h5 class="uppercase sb-title">{{$data['#detailwrite']['heading']}}</h5>
                                            @auth()
                                            <div class="row">
                                                <form action="{{url('detail/'.$detail->id)}}" method="POST" style="width: 100%;">
                                                    @csrf
                                                    <div class="container">
                                                        <label for="">Rate Product<span style="color: red;"> *</span></label>
                                                        <div class="star-widget">
                                                            <input type="radio" value="5" name="rate" id="rate-5">
                                                            <label for="rate-5" class="fa fa-star"></label>
                                                            <input type="radio" value="4" name="rate" id="rate-4">
                                                            <label for="rate-4" class="fa fa-star"></label>
                                                            <input type="radio" value="3" name="rate" id="rate-3">
                                                            <label for="rate-3" class="fa fa-star"></label>
                                                            <input type="radio" value="2" name="rate" id="rate-2">
                                                            <label for="rate-2" class="fa fa-star"></label>
                                                            <input type="radio" value="1" name="rate" id="rate-1">
                                                            <label for="rate-1" class="fa fa-star"></label>
                                                        </div>
                                                        {!!$errors->first("rate", "<span class='text-danger'>:message</span>")!!}
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="hidden" name="id" value="{{$detail->id}}">
                                                        <div class=" mb-20">
                                                            <label for="">Comment <span style="color: red;"> *</span></label>
                                                            <textarea name="message" class="form-control" placeholder="Your Comment*"></textarea>
                                                            {!!$errors->first("message", "<span class='text-danger'>:message</span>")!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="input-box">
                                                            <input name="submit" style="cursor: pointer;" class="sbumit-btn" value="Post Comment" type="submit">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            @else
                                            <h6 style="color:red;">Please Login first</h6> <a class="btn btn-danger" href="{{url('login')}}">Login</a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fix fade in" id="specialoffer">
                                    <ul class="tag-filter">
                                        @foreach ($tag as $item)
                                        <li><a href="{{url('search/'.$item->sale)}}">{{$item->sale}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--descripton-area end-->

<!--new arrival area start-->
<div class="new-arrival-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#detailrelated']['heading']}}</h5>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
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
                                        <li><a style="cursor: pointer;" data-tooltip="Quick View" class="q-view" data-toggle="modal" data-target=".product{{$item->id}}"><i class="fa fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-text" style="width: 100%;">
                                <div class="prodcut-name"> <a href="{{url('detail/'.$item->id)}}" style="width:100%;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{$item->name}}</a>
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
        </div>
    </div>
</div>
<!--new arrival area end-->
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
