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
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#blogdetailtop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#blogdetailtop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#blogdetailtop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--single blog main area are start-->
<div class="shop-main-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            <!--shop sidebar start-->
            <div class="col-lg-3 col-md-4 order-2">
                <div class="shop-sidebar blog-sidebar">
                    <!--single aside start-->
                    <!-- <aside class="single-aside search-aside search-box">
                        <form action="#">
                            <div class="input-box">
                                <input class="single-input" placeholder="Search...." type="text">
                                <button class="src-btn sb-2"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </aside> -->
                    <!--single aside end-->

                    <!--single aside start-->
                    <aside class="single-aside catagories-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#blogdetailcategory']['heading']}}</h5>
                        </div>
                        <div id="cat-treeview" class="product-cat">
                            <ul>
                                @foreach ($menu as $item)
                                <li class="closed"><a href="{{url('shop')}}">{{$item->name}}</a>
                                    <ul>
                                        @foreach ($macro_menu->where('menu_id',$item->id) as $item1)
                                        @foreach ($micro_menu->where('macro_menu_id',$item1->id) as $item2)
                                        <li><a href="{{url('category/'.$item2->id)}}">{{$item2->name}}</a></li>
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
                    <aside class="single-aside tag-aside">
                        <div class="heading-title aside-title pos-rltv">
                            <h5 class="uppercase">{{$data['#blogdetailtag']['heading']}}</h5>
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
                            <h5 class="uppercase">{{$data['#blogdetailrecent']['heading']}}</h5>
                        </div>
                        <div class="recent-prodcut-wraper">
                            <!-- single product start-->
                            @foreach ($products->take(5) as $item)
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

                    </aside>
                    <!--single aside end-->

                    <!--single aside start-->
                    <aside class="single-aside add-aside">
                        <a href="{{url('shop')}}"><img src="images/banner/add.jpg" alt=""></a>
                    </aside>
                    <!--single aside end-->
                </div>
            </div>
            <!--shop sidebar end-->

            <!--main-shop-product start-->
            <div class="col-lg-9 col-md-8 order-lg-2 order-md-2 order-1">
                <div class="single-blog-body">
                    <div class="single-blog sb-2 mb-30">
                        <div class="blog-img pos-rltv product-overlay">
                            <a href="{{url('blogdetail/'.$blogdetail->id)}}">
                                @if ($blogdetail->image!=null)
                                <img src="{{asset('img'.$blogdetail->image)}}" style="height: 430px; width:100%;" alt="">
                                @else
                                <iframe style="width:100%; height:430px;" src="{{$blogdetail->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                @endif
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-title">
                                <h5 class="uppercase font-bold" title="{{$blogdetail->name}}">{{$blogdetail->name}}</h5>
                                <div class="like-comments-date">
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>{{count($comment->where('blog_id',$blogdetail->id))}} Comments</a>
                                        </li>
                                        <li class="blog-date"><a href="#"><i class="zmdi zmdi-calendar-alt"></i>{{$blogdetail->created_at}}</a></li>
                                    </ul>
                                </div>
                                <div class="blog-text" style="text-align: justify;">
                                    <p>{!!$blogdetail->description!!}</p>
                                </div>
                            </div>
                            @if ($blogdetail->important!=null)
                            <div class="blockqot mtb-30" style="text-align: justify;">
                                <blockquote>
                                    <p>{!!$blogdetail->important!!}</p>
                                </blockquote>
                            </div>
                            @endif
                            <div class="related-post mt-30">
                                <h5 class="uppercase sb-title">{{$data['#blogdetailrelated']['heading']}}</h5>
                                <div class=" row">
                                    @foreach ($blog->take(2) as $item)
                                    <div class="col-lg-6">
                                        <div class="single-blog">
                                            <div class="blog-img pos-rltv product-overlay">
                                                <a href="{{url('blogdetail/'.$item->id)}}">
                                                    @if ($item->image!=null)
                                                    <img src="{{asset('img'.$item->image)}}" style="height: 315px; width:100%;" alt="">
                                                    @else
                                                    <iframe style="width:100%; height:315px;" src="{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-title">
                                                    <h5 class="uppercase font-bold"><a href="{{url('blogdetail/'.$item->id)}}" class="heading-hidden">
                                                            {{$item->name}}
                                                        </a>
                                                    </h5>
                                                    <div class="like-comments-date">
                                                        <ul>
                                                            <li><a href="#"><i class="zmdi zmdi-comment-outline"></i>{{count($comment->where('blog_id',$item->id))}} Comments</a></li>
                                                            <li class="blog-date"><a href="#"><i class="zmdi zmdi-calendar-alt"></i>{{$item->created_at}}</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="blog-text" style="text-align: justify; height: 100px; overflow:hidden; width: 100%;">
                                                        <p>{!!$item->description!!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <hr />
                            <div class="comments-area fix mt-20">
                                <h5 class="uppercase sb-title">{{$data['#blogdetailcomment']['heading']}}</h5>
                                <div class="comments-body">
                                    <ul>
                                        @if (count($comment->where('blog_id',$blogdetail->id))==0)
                                        <li style="text-align: center;">No Comments</li>
                                        @else
                                        @foreach ($comment->where('blog_id',$blogdetail->id) as $item)


                                        <li class="signle-comments">
                                            @if ($item->user_name->image!=null)
                                            <img src="{{asset('img/'.$item->user_name->image)}}" style="width:70px; height:70px;" alt="">
                                            @else
                                            <img src="{{asset('images/blog/demo.jpg')}}" style="width:70px; height:70px;" alt="">
                                            @endif
                                            <div class="commets-text">
                                                <h5>{{$item->user_name->fname}} {{$item->user_name->lname}}</h5>
                                                <span>{{$item->created_at}}</span>
                                                <p>{{$item->description}}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <hr/>
                            <div class="leave-through-area clearfix mt-40">
                                <h5 class="uppercase sb-title">{{$data['#blogdetailwrite']['heading']}}</h5>
                                @auth()
                                <div class="row">
                                    <form action="{{url('blogdetail/'.$blogdetail->id)}}" method="POST" style="width: 100%;">
                                    @csrf
                                        <div class="col-lg-12">
                                            <input type="hidden" name="id" value="{{$blogdetail->id}}">
                                            <div class=" mb-20">
                                                <textarea name="message" class="form-control" placeholder="Your Comment*"></textarea>
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
                </div>
                <!--main-shop-product start-->
            </div>
        </div>
    </div>
</div>
<!--single blog main area are end-->
@endsection