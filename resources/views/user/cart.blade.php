<?php
$data =content();
$productimage = productimage();
$product = product();
$sub_total = 0;
$total = 0;
$discount = 0;
$coupon_id = 0;
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#carttop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#carttop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#carttop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--cart-checkout-area start -->
<div class="cart-checkout-area  pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                <div class="product-area">
                    <div class="title-tab-product-category row">
                        <div class="col-lg-12 text-center pb-60">
                            <ul class="nav heading-style-3" role="tablist">
                                <li role="presentation"><a class="active shadow-box" href="#cart" aria-controls="cart" role="tab" data-toggle="tab"><span>01</span>
                                {{$data['#carttab1']['heading']}}</a></li>
                                <li role="presentation"><a class="shadow-box" href="#checkout" aria-controls="checkout" role="tab" data-toggle="tab"><span>02</span>
                                {{$data['#carttab2']['heading']}}</a></li>
                                <li role="presentation"><a class="shadow-box" href="#complete-order" aria-controls="complete-order" role="tab" data-toggle="tab"><span>03</span>
                                {{$data['#carttab3']['heading']}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="content-tab-product-category pb-70">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="cart">
                                <!-- cart are start-->
                                <div class="cart-page-area">
                                    <div class="table-responsive mb-20">
                                        <table class="shop_table-2 cart table">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail ">Image</th>
                                                    <th>Product Name</th>
                                                    <th>Unit Price</th>
                                                    <th>Colors</th>
                                                    <th>Sizes</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Update/Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @csrf
                                                @auth
                                                @if(count($cart->where('user_id',auth()->user()->id))!=0)
                                                @foreach ($cart->where('user_id',auth()->user()->id) as $item)
                                                <tr class="cart_item">
                                                    <td class="item-img">
                                                        @foreach ($productimage->where('product_id',$item->product_id)->take(1) as $item1)
                                                        <a href="{{url('detail/'.$item1->id)}}"><img src="{{asset('img/'.$item1->image)}}" style="height: 100px; width:100%;" alt=""></a>
                                                        @endforeach
                                                    </td>
                                                    @foreach ($product->where('id',$item->product_id) as $item1)
                                                    <td class="item-title"> <a href="{{url('detail/'.$item1->id)}}" class="heading-hidden" style="font-weight: bold; font-size:16px;">{{$item1->name}} </a></td>
                                                    <td class="item-price"> {{number_format($item1->price)}} </td>
                                                    <td>
                                                        <?php $colors = unserialize($item->colors); ?>
                                                        @if($item->colors!=null)
                                                        @for ($i=0; $i<count($colors); $i++) <span style="color:<?php echo $colors[$i]; ?>; font-size:18px;" class="fa fa-stop"></span>
                                                            @endfor
                                                            @else
                                                            Default
                                                            @endif
                                                    </td>
                                                    <td>
                                                        <?php $sizes = unserialize($item->sizes); ?>
                                                        @if($item->sizes!=null)
                                                        @for ($i=0; $i<count($sizes); $i++) <span><?php echo $sizes[$i]; ?>,</span>
                                                            @endfor
                                                            @else
                                                            Default
                                                            @endif
                                                    </td>
                                                    <form action="{{url('user/cartupdate')}}" method="POST">
                                                        @csrf
                                                        <td class="item-qty">
                                                            <div class="cart-quantity">
                                                                <div class="product-qty">
                                                                    <div class="cart-quantity">
                                                                        <div class="cart-plus-minus">
                                                                            <input value="{{$item->id}}" name="id" type="hidden">
                                                                            <input type="number" value="{{$item->qty}}" name="qty" class="cart-plus-minus-box">
                                                                            {!!$errors->first("qty", "<span class='text-danger'>:message</span>")!!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="total-price"><strong>
                                                                <?php
                                                                $sub_total += $item1->price * $item->qty;
                                                                if ($item->coupon_id != null) {
                                                                    $discount = $item->coupon_name->discount;
                                                                    $coupon_id = $item->coupon_name->id;
                                                                }

                                                                echo number_format($item1->price * $item->qty);
                                                                ?></strong>
                                                        </td>
                                                        <td class="remove-item">
                                                            <button class="btn btn-info" title="Update"><i class="fa fa-check"></i></button>
                                                    </form>
                                                    <form action="{{url('user/cartremove')}}" method="POST">
                                                        @csrf
                                                        <input value="{{$item->id}}" name="id" type="hidden">
                                                        <button class="btn btn-danger" style="margin-top:5px;" title="Remove"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>No Items Found</tr>
                                                @endif
                                                @endauth
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="cart-bottom-area">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7">
                                                <div class="update-coupne-area">
                                                    <div class="update-continue-btn text-right pb-20">

                                                        </form>
                                                        <a href="{{url('shop')}}" class="btn btn-danger" style="height: 35px; line-height: 33px; border: 1px solid #333; padding: 0 15px; font-weight:bold;">Continue
                                                            Shopping</a>
                                                    </div>
                                                    <div class="coupn-area">
                                                        <div class="catagory-title cat-tit-5 mb-20">
                                                            <h3>{{$data['#cartcoupon']['heading']}}</h3>
                                                            <p>{!!$data['#cartcoupon']['description']!!}
                                                            </p>
                                                        </div>
                                                        <form action="{{url('user/applycoupon')}}" method="POST">
                                                            @csrf
                                                            <div class="input-box input-box-2 mb-20">
                                                                <input type="text" placeholder="Coupon" class="info" name="name">
                                                                {!!$errors->first("name", "<span class='text-danger'>:message</span>")!!}
                                                            </div>
                                                            <button class="btn btn-danger">Apply Coupon</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-5">
                                                <div class="cart-total-area">
                                                    <div class="catagory-title cat-tit-5 mb-20 text-right">
                                                        <h3>Cart Total</h3>
                                                    </div>
                                                    <div class="sub-shipping">
                                                        <p>Sub Total <span>{{number_format($sub_total)}}</span></p>
                                                    </div>
                                                    <div class="sub-shipping">
                                                        <p>Discount({{$discount}}%) <span>{{number_format(($sub_total/100)*$discount)}}</span></p>
                                                    </div>

                                                    <div class="process-cart-total">
                                                        <p>Total <span>{{number_format($sub_total-(($sub_total/100)*$discount))}}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- cart are end-->
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                <!-- Checkout are start-->
                                <div class="checkout-area">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="coupne-customer-area mb50">
                                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-checkout">
                                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                                <h4 class="panel-title">
                                                                    <img src="{{asset('images/icons/acc.jpg')}}" alt="">
                                                                    {{$data['#carthomeaddress']['heading']}}
                                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Click here to open
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                <div class="panel-body">
                                                                    <form action="{{url('user/useraddress')}}" method="POST">
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>First Name
                                                                                        <em>*</em></label>
                                                                                    <input type="text" name="fname" value="{{auth()->user()->fname}}" disabled class="info" placeholder="First Name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6 col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Last
                                                                                        Name<em>*</em></label>
                                                                                    <input type="text" name="lname" value="{{auth()->user()->lname}}" disabled class="info" placeholder="Last Name">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Email
                                                                                        Address<em>*</em></label>
                                                                                    <input type="email" name="email" value="{{auth()->user()->email}}" disabled class="info" placeholder="Your Email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Phone
                                                                                        Number<em>*</em></label>
                                                                                    <input type="text" name="phone" value="{{auth()->user()->phone}}" disabled class="info" placeholder="Phone Number">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Country
                                                                                        <em>*</em></label>
                                                                                    <select name="country" class="selectpicker select-custom" data-live-search="true">
                                                                                        @foreach ($country as $item)
                                                                                        <option value="{{$item->id}}" @if($useraddress->country_id == $item->id) selected @endif> {{$item->name}}</option>
                                                                                        @endforeach
                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box">
                                                                                    <label>State/Divison
                                                                                        <em>*</em></label>
                                                                                    <select name="state" class="selectpicker select-custom" data-live-search="true">
                                                                                        @foreach ($state as $item)
                                                                                        <option value="{{$item->id}}" @if($useraddress->state_id==$item->id) selected @endif> {{$item->name}} ({{$item->country_name->name}})</option>
                                                                                        @endforeach

                                                                                    </select>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Town/City
                                                                                        <em>*</em></label>
                                                                                    <select name="city" class="selectpicker select-custom" data-live-search="true">
                                                                                        @foreach ($city as $item)
                                                                                        <option value="{{$item->id}}" @if($useraddress->city_id==$item->id) selected @endif> {{$item->name}} ({{$item->state_name->name}})({{$item->state_name->country_name->name}})</option>
                                                                                        @endforeach

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-box">
                                                                                    <label>Post Code/Zip
                                                                                        Code<em>*</em></label>
                                                                                    <input type="text" value="{{$useraddress->zipcode}}" name="zipcode" class="info" placeholder="Zip Code">
                                                                                    {!!$errors->first("zipcode", "<span class='text-danger'>:message</span>")!!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Home Address
                                                                                        <em>*</em></label>
                                                                                    <input type="text" name="address" value="{{$useraddress->address}}" class="info mb-10" placeholder="Street Address">
                                                                                    {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="input-box mb-20">
                                                                                    <label>Office Address
                                                                                        <em>*</em></label>
                                                                                    <input type="text" name="office" value="{{$useraddress->shipping}}" class="info mb-10" placeholder="Street Address">
                                                                                    {!!$errors->first("office", "<span class='text-danger'>:message</span>")!!}
                                                                                </div>
                                                                            </div>


                                                                            <div class="col-lg-3">
                                                                                <div class="create-acc clearfix mtb-20">
                                                                                    <button class="btn btn-danger">Update</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="billing-details">
                                                            <div class="contact-text right-side">
                                                                <h2>{{$data['#cartotheraddress']['heading']}}</h2>
                                                                <form action="{{url('user/otheraddress')}}" method="POST">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>First Name
                                                                                    <em>*</em></label>
                                                                                <input type="text" name="fname" value="{{$shipping->fname}}" class="info" placeholder="First Name">
                                                                                {!!$errors->first("fname", "<span class='text-danger'>:message</span>")!!}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Last
                                                                                    Name<em>*</em></label>
                                                                                <input type="text" name="lname" value="{{$shipping->lname}}" class="info" placeholder="Last Name">
                                                                                {!!$errors->first("lname", "<span class='text-danger'>:message</span>")!!}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Email
                                                                                    Address<em>*</em></label>
                                                                                <input type="email" name="email" value="{{$shipping->email}}" class="info" placeholder="Your Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Phone
                                                                                    Number<em>*</em></label>
                                                                                <input type="text" name="phone" value="{{$shipping->phone}}" class="info" placeholder="Phone Number">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Country
                                                                                    <em>*</em></label>
                                                                                <select name="country" class="selectpicker select-custom" data-live-search="true">
                                                                                    @foreach ($country as $item)
                                                                                    <option value="{{$item->id}}" @if($shipping->country_id == $item->id) selected @endif> {{$item->name}}</option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box">
                                                                                <label>State/Divison
                                                                                    <em>*</em></label>
                                                                                <select name="state" class="selectpicker select-custom" data-live-search="true">
                                                                                    @foreach ($state as $item)
                                                                                    <option value="{{$item->id}}" @if($shipping->state_id==$item->id) selected @endif> {{$item->name}} ({{$item->country_name->name}})</option>
                                                                                    @endforeach
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-box mb-20">
                                                                                <label>Town/City
                                                                                    <em>*</em></label>
                                                                                <select name="city" class="selectpicker select-custom" data-live-search="true">
                                                                                    @foreach ($city as $item)
                                                                                    <option value="{{$item->id}}" @if($shipping->city_id==$item->id) selected @endif> {{$item->name}} ({{$item->state_name->name}})({{$item->state_name->country_name->name}})</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-box">
                                                                                <label>Post Code/Zip
                                                                                    Code<em>*</em></label>
                                                                                <input type="text" name="zipcode" value="{{$shipping->zipcode}}" class="info" placeholder="Zip Code">
                                                                                {!!$errors->first("zipcode", "<span class='text-danger'>:message</span>")!!}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="input-box mb-20">
                                                                                <label>Address
                                                                                    <em>*</em></label>
                                                                                <input type="text" name="address" value="{{$shipping->address}}" class="info mb-10" placeholder="Street Address">
                                                                                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-lg-3">
                                                                            <div class="create-acc clearfix mtb-20">
                                                                                <button class="btn btn-danger">Update</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout are end-->
                            </div>
                            <div role="tabpanel" class="tab-pane  fade in" id="complete-order">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout-payment-area">
                                            <div class="checkout-total mt20">
                                                <h3>{{$data['#cartorder']['heading']}}</h3>
                                                <div class="table-responsive">
                                                    <table class="checkout-area table">
                                                        <thead>
                                                            <tr class="cart_item check-heading">
                                                                <td class="ctg-type"> Product</td>
                                                                <td class="cgt-des" style="text-align: right;"> Total</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cart as $item)
                                                            <tr class="cart_item check-item prd-name">
                                                                <td class="ctg-type">{{$item->product_name->name}} ×
                                                                    <span>{{$item->qty}}</span>
                                                                </td>
                                                                <td class="cgt-des" style="text-align: right;"> <?php
                                                                                                                echo number_format(($item->product_name->price) * $item->qty);

                                                                                                                ?></td>
                                                            </tr>
                                                            @endforeach
                                                            <tr class="cart_item">
                                                                <td class="ctg-type"> Subtotal</td>
                                                                <td class="cgt-des" style="text-align: right;">{{number_format($sub_total)}}</td>
                                                            </tr>
                                                            <tr class="cart_item">
                                                                <td class="ctg-type">Discount ({{$discount}}%)</td>
                                                                <td class="cgt-des ship-opt" style="text-align: right;">
                                                                    <div class="shipp">
                                                                        {{number_format(($sub_total/100)*$discount)}}
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="cart_item">
                                                                <td class="ctg-type">Shipping Charge</td>
                                                                <td class="cgt-des ship-opt" style="text-align: right;">
                                                                    <div class="shipp">
                                                                        @if($sub_total >= $data['#shipping']['heading'])
                                                                            <span style="color: red;">Free Shipping</span>
                                                                            @else
                                                                            {{number_format($data['#shipping']['icon'])}}
                                                                            @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="cart_item">
                                                                <td class="ctg-type crt-total"> Total
                                                                </td>
                                                                <td class="cgt-des prc-total" style="text-align: right;">
                                                                    {{number_format(($sub_total-(($sub_total/100)*$discount))+$data['#shipping']['icon'])}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="payment-section mt-20 clearfix">
                                                <div class="pay-toggle">
                                                    <form action="{{url('user/orderplace')}}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <input type="hidden" name="coupon_id" value="{{$coupon_id}}">
                                                                <input type="hidden" name="discount" value="{{$discount}}">
                                                                <label style=" font-weight: bold; color: #000;">Payment Method <em style=" color: red;">*</em></label>
                                                                <select name="method" class="form-control">
                                                                    <option value="">
                                                                        Cash on Delivery</option>
                                                                    @foreach ($transactiontype as $item)

                                                                    <option value="{{$item->id}}">
                                                                        {{$item->name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <label style=" font-weight: bold; color: #000;">Select Address <em style=" color: red;">*</em></label><br />
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="address" id="inlineRadio1" value="1" checked>
                                                                    <label class="form-check-label" for="inlineRadio1" style=" color: #000;">Home</label>
                                                                </div>
                                                                @if($useraddress->shipping != null)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="address" id="inlineRadio2" value="2">
                                                                    <label class="form-check-label" for="inlineRadio2" style=" color: #000;">Office</label>
                                                                </div>
                                                                @endif
                                                                @if($shipping->address != null)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="address" id="inlineRadio3" value="3">
                                                                    <label class="form-check-label" for="inlineRadio3" style=" color: #000;">Other</label>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <button class="form-control btn btn-danger" style="height: 100%; font-weight:bold; font-size:20px;">Place order</button>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-8"></div>
                                                            <div class="col-lg-4">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--cart-checkout-area end-->
@endsection
@section('after-script')
<script>
    $(".alert").delay(5000).slideUp(300);
</script>
@endsection