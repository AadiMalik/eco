<?php
$media = media();
$data = content();
$menu = menu();
$macro_menu = macro_menu();
$micro_menu = micro_menu();
$cart = cart();
$wish = wish();
$productimage = productimage();
$product = product();
$total = 0;
?>
<marquee behavior="scroll" style="padding:5px 0px;background: #cc3333; color:#fff; font-size:18px; font-weight:bold;" direction="left">Free shipping for orders over Rs {{$data['#shipping']['heading']}}!</marquee>

<!-- Start of header area -->
<header id="sticky-header"  class="header-area header-wrapper">
    <div class="header-top-bar black-bg clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                    <div class="login-register-area">
                        <ul>
                            @auth
                            @if(auth()->user()->role==1 && auth()->user()->status==2)
                            <li><a href="{{ url('admin/dashboard') }}">Admin Panel</a></li>
                            @elseif(auth()->user()->role==2 && auth()->user()->status==2)
                            <li><a href="{{ url('user/account') }}">My Account</a></li>

                            @endif
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                            @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="social-search-area text-center">
                        <div class="social-icon socile-icon-style-2">
                            <ul>
                                @foreach ($media as $item)
                                <li><a target="_blank" href="{{$item->link}}" title="{{$item->name}}"><i class="{{$item->icon}}"></i></a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <div class="cart-currency-area login-register-area text-right">
                        <ul>
                            <li id="div1">
                                <div class="header-cart">
                                    <div> <a href="{{url('user/cart')}}"><i style="font-size: 25px;" class="fa fa-shopping-cart"></i><span class="badge badge-dark" style="border-radius: 30%; border:1px solid #fff; font-size:11px;">@auth{{count($cart->where('user_id',auth()->user()->id))}}@else 0 @endauth</span></a>
                                    </div>

                                    <div class="cart-content-wraper" style="max-height: 600px; overflow-y: auto;">
                                        @auth
                                        @if(count($cart->where('user_id',auth()->user()->id))!=0)
                                        @foreach ($cart->where('user_id',auth()->user()->id) as $item)
                                        <div class="cart-single-wraper">
                                            <div class="cart-img">
                                                @foreach ($productimage->where('product_id',$item->product_id)->take(1) as $item1)
                                                <a href="{{url('detail/'.$item1->id)}}"><img src="{{asset('img/'.$item1->image)}}" style="height: 100px; width:100%;" alt=""></a>
                                                @endforeach
                                            </div>
                                            @foreach ($product->where('id',$item->product_id) as $item1)

                                            <div class="cart-content">
                                                <div class="cart-name"> <a href="{{url('detail/'.$item1->id)}}" class="heading-hidden" style="font-weight: bold; font-size:16px;">{{$item1->name}}</a>
                                                </div>
                                                <div class="cart-price"> {{number_format($item1->price)}} </div>
                                                <div class="cart-qty"> Qty: <span>{{$item->qty}}</span> </div>
                                                <?php
                                                $total += $item1->price;
                                                ?>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="cart-single-wraper">
                                            <h5>No Items Found!</h5>
                                        </div>
                                        @endif
                                        @else
                                        <div class="cart-single-wraper">
                                            <h5>Please Login First!</h5>
                                        </div>
                                        @endauth
                                        <div class="cart-subtotal"> Subtotal: <span><?php echo number_format($total) ?></span> </div>
                                        <div class="cart-check-btn">
                                            <div class="view-cart"> <a class="btn-def" href="{{url('user/cart')}}">View
                                                    Cart</a> </div>
                                            <div class="check-btn"> <a class="btn-def" href="{{url('user/cart')}}">Checkout</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="header-cart">
                                    <div> <a href="{{url('user/wishlist')}}"><i style="font-size: 25px;" class="fa fa-heart"></i><span class="badge badge-dark" style="border-radius: 30%; border:1px solid #fff; font-size:11px;">@auth{{count($wish->where('user_id',auth()->user()->id))}}@else 0 @endauth</span></a>
                                    </div>
                                    <div class="cart-content-wraper" style="max-height: 600px; overflow-y: auto;">
                                        @auth
                                        @if(count($wish->where('user_id',auth()->user()->id))!=0)
                                        @foreach ($wish->where('user_id',auth()->user()->id) as $item)
                                        <div class="cart-single-wraper">
                                            <div class="cart-img">
                                                @foreach ($productimage->where('product_id',$item->product_id)->take(1) as $item1)
                                                <a href="{{url('detail/'.$item1->id)}}"><img src="{{asset('img/'.$item1->image)}}" style="height: 100px; width:100%;" alt=""></a>
                                                @endforeach
                                            </div>
                                            @foreach ($product->where('id',$item->product_id) as $item1)

                                            <div class="cart-content">
                                                <div class="cart-name"> <a href="{{url('detail/'.$item1->id)}}" class="heading-hidden" style="font-weight: bold; font-size:16px;">{{$item1->name}}</a>
                                                </div>
                                                <div class="cart-price"> {{number_format($item1->price)}} </div>
                                                <?php
                                                $total += $item1->price;
                                                ?>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="cart-single-wraper">
                                            <h5>No Items Found!</h5>
                                        </div>
                                        @endif
                                        @else
                                        <div class="cart-single-wraper">
                                            <h5>Please Login First!</h5>
                                        </div>
                                        @endauth
                                        <div class="cart-check-btn">
                                            <div class="view-cart"> <a class="btn-def" href="{{url('user/wishlist')}}">View
                                                    Wishlist</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-area">
        <div class="container">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo ptb-20"><a href="{{url('/')}}">
                                @if($data['#logo']['image']==null)
                                <a href="{{url('/')}}">
                                    <h3 style="color: #cc3333; font-size: 30px; line-height: 43px; font-weight: bold;">{{$data['#logo']['heading']}}</h3>
                                </a>
                                @else
                                <img src="{{asset('img/'.$data['#logo']['image'])}}" style="width:100%; height:80px;" alt="main logo">
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 d-none d-md-block">
                        <nav id="primary-menu">
                            <ul class="main-menu">
                                <li @if(Request::is('/')) class="current" @endif><a @if(Request::is('/')) class="active" @endif href="{{url('/')}}">Home</a>

                                </li>
                                @foreach ($menu->take(6) as $item)
                                <li class="mega-parent pos-rltv"><a href="{{url('shop')}}">{{$item->name}}</a>
                                    <div class="mega-menu-area mma-800">
                                        @foreach ($macro_menu->where('menu_id',$item->id) as $item1)
                                        <ul class="single-mega-item">
                                            <li class="menu-title uppercase">{{$item1->name}}</li>
                                            @foreach ($micro_menu->where('macro_menu_id',$item1->id) as $item2)
                                            <li><a href="{{url('category/'.$item2->id)}}">{{$item2->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endforeach
                                        <div class="mega-banner-img">
                                            <a href="{{url('shop')}}"><img src="{{asset('img/'.$data['#navbarimage']['image'])}}" style="    height: 200px;" alt=""></a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <li @if(!Request::is('/')) class="mega-parent current" @endif><a @if(!Request::is('/')) class="active" @endif href="">Pages</a>
                                    <div class="mega-menu-area mma-970">
                                        <ul class="single-mega-item coloum-4">
                                            <li class="menu-title uppercase">Others</li>
                                            <li><a href="{{url('payment')}}">Payments</a></li>
                                            <li><a href="{{url('about')}}">About Us</a></li>
                                            <li><a href="{{url('contact')}}">Contact Us</a></li>
                                            <li><a href="{{url('shop')}}">Products</a></li>
                                            <li><a href="{{url('blog')}}">Blog</a></li>
                                            <li><a href="{{url('/')}}">Search Product</a></li>
                                        </ul>
                                        <ul class="single-mega-item coloum-4">
                                            <li class="menu-title uppercase">Account</li>
                                            @auth
                                            @if(auth()->user()->role==1 && auth()->user()->status==2)
                                            <li><a href="{{ url('admin/dashboard') }}">Admin Panel</a></li>
                                            @elseif(auth()->user()->role==2 && auth()->user()->status==2)
                                            <li><a href="{{ url('user/account') }}">My Account</a></li>

                                            @endif
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>

                                            @else
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                            @endauth
                                            <li><a href="{{url('user/cart')}}">Shopping Cart</a></li>
                                            <li><a href="{{url('user/cart')}}">Checkout</a></li>
                                            <li><a href="{{url('user/cart')}}">Complete Order</a></li>
                                            <li><a href="{{url('user/wishlist')}}">Wish List</a></li>
                                        </ul>
                                        <ul class="single-mega-item coloum-4">
                                            <li class="menu-title uppercase">Help</li>
                                            <li><a href="{{url('about')}}">Information</a></li>
                                            <li><a href="{{url('term')}}">Term & Conditions</a>
                                            <li><a href="{{url('faq')}}">FAQ</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>


                    <!-- mobile-menu-area start -->
                    <div class="mobile-menu-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <nav id="dropdown">
                                        <ul>
                                            <li><a href="{{url('/')}}">Home</a>
                                            </li>
                                            @foreach ($menu->take(6) as $item)
                                            <li class="mega-parent pos-rltv"><a href="{{url('shop')}}">{{$item->name}}</a>
                                                <div class="mega-menu-area mma-800">
                                                    @foreach ($macro_menu->where('menu_id',$item->id) as $item1)
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title uppercase">{{$item1->name}}</li>
                                                        @foreach ($micro_menu->where('macro_menu_id',$item1->id) as $item2)
                                                        <li><a href="{{url('search/'.$item2->id)}}">{{$item2->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endforeach
                                                    <div class="mega-banner-img">
                                                        <a href="single-product.html"><img src="images/banner/banner-fashion-02.jpg" alt=""></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            <li> <a href="#">Pages</a>
                                                <ul class="single-mega-item coloum-4">
                                                    <li class="menu-title uppercase">Others</li>
                                                    <li><a href="{{url('payment')}}">Payments</a></li>
                                                    <li><a href="{{url('about')}}">About Us</a></li>
                                                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                                                    <li><a href="{{url('shop')}}">Products</a></li>
                                                    <li><a href="{{url('blog')}}">Blog</a></li>
                                                    <li><a href="{{url('/')}}">Search Product</a></li>
                                                    <li class="menu-title uppercase">Account</li>
                                                    @auth
                                                    @if(auth()->user()->role==1 && auth()->user()->status==2)
                                                    <li><a href="{{ url('admin/dashboard') }}">Admin Panel</a></li>
                                                    @elseif(auth()->user()->role==2 && auth()->user()->status==2)
                                                    <li><a href="{{ url('user/account') }}">My Account</a></li>

                                                    @endif
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>

                                                    @else
                                                    <li><a href="{{ route('login') }}">Login</a></li>
                                                    <li><a href="{{ route('register') }}">Register</a></li>
                                                    @endauth
                                                    <li><a href="{{url('user/cart')}}">Shopping Cart</a></li>
                                                    <li><a href="{{url('user/cart')}}">Checkout</a></li>
                                                    <li><a href="{{url('user/cart')}}">Complete Order</a></li>
                                                    <li><a href="{{url('user/wishlist')}}">Wish List</a></li>
                                                    <li class="menu-title uppercase">Help</li>

                                                    <li><a href="{{url('about')}}">Information</a></li>
                                                    <li><a href="{{url('term')}}">Term & Conditions</a>
                                                    <li><a href="{{url('faq')}}">FAQ</a></li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--mobile menu area end-->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of header area -->