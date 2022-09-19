<?php
$data = content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#searchtop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#searchtop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#searchtop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->
<!--new arrival area start-->
<div class="new-arrival-area pb-70 mt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="heading-title heading-style pos-rltv mb-50 text-center">
                    <h5 class="uppercase">{{$data['#search']['heading']}}</h5>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Product Search by Size</h3>
                <hr style="margin: 0px;"/>
                <div class="total-new-arrival carsoule-btn row">
                    @if(count($size)!=0)
                    @foreach ($size as $item1)
                    @foreach ($search->where('id',$item1->product_id) as $item)
                    <div class="col-lg-3" style="width: 100%; margin-top:20px;">
                        <!-- single product start-->
                        <input type="hidden" id="product{{$item->id}}" value="{{$item->id}}">
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
                    @endforeach
                    @else
                    <h5 style="text-align: center;">No Item Found!</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--new arrival area end-->

<!--Total area end-->
<!-- QUICKVIEW PRODUCT -->
@foreach ($search as $item)
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
        foreach ($search as $item) {
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