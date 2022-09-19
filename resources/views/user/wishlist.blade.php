<?php
$data=content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: url({{asset('img/'.$data['#wishtop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#wishtop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#wishtop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!-- wishlist are start-->
<div class="wishlist-area ptb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4>{{$data['#wishtable']['heading']}}</h4>
                <div class="cart-page-area">
                    <form method="post" action="#">
                        <div class="table-responsive">
                            <table class="shop_table-2 cart table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail ">Image</th>
                                        <th class="product-name ">Product Name</th>
                                        <th class="product-price ">Unit Price</th>
                                        <th class="product-subtotal ">Stock</th>
                                        <th class="product-quantity">Add Item</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($wish)==0)
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No Items Found</td>
                                    </tr>
                                    @else
                                    @foreach ($wish as $item)

                                    <tr class="cart_item">
                                        <input type="hidden" id="product{{$item->product_id}}" value="{{$item->product_id}}">
                                        <td class="item-img">
                                            @foreach ($productimage->where('product_id',$item->product_id)->take(1) as $item1)

                                            <a href="{{url('detail/'.$item->product_id)}}"><img src="{{asset('img/'.$item1->image)}}" style="width:100%; height:100px;" alt=""> </a>
                                            @endforeach
                                        </td>
                                        <td class="item-title"> <a href="{{url('detail/'.$item->product_id)}}">{{$item->product_name->name}} </a></td>
                                        <td class="item-price"> {{$item->product_name->price}} </td>
                                        <td class="item-qty">
                                            @if($item->product_name->stock==2)
                                            In Stock
                                            @else
                                            Out of Stock
                                            @endif
                                        </td>
                                        <td class="total-price">
                                            <a class="btn-def btn2"  id="addcart{{$item->product_id}}" style="cursor: pointer;">Add To Cart</a>
                                        </td>
                                        <td class="remove-item"><a id="removewish{{$item->product_id}}" style="cursor: pointer;"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- wishlist are end-->
@endsection
@section('after-script')
@section('after-script')
<script>
    $(document).ready(function() {

        <?php
        foreach ($wish as $item) {
        ?>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addcart<?php echo $item->product_id; ?>').click(function() {
                var pro_id<?php echo $item->product_id; ?> = parseInt($('#product<?php echo $item->product_id; ?>').val());
                var qty = 1;
                $.ajax({
                    type: 'POST',
                    url: "{{url('user/addcart')}}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        qty: qty,
                        product_id: pro_id<?php echo $item->product_id; ?>,
                        user_id: <?php echo auth()->user()->id; ?>
                    },

                    success: function(data) {
                        location.reload();
                        alert(data.success);
                    }
                });

            });
            $('#removewish<?php echo $item->product_id; ?>').click(function() {
                var pro_id<?php echo $item->product_id; ?> = parseInt($('#product<?php echo $item->product_id; ?>').val());
                $.ajax({
                    type: 'POST',
                    url: "{{url('user/remove')}}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_id: pro_id<?php echo $item->product_id; ?>,
                        user_id: <?php echo auth()->user()->id; ?>
                    },

                    success: function(data) {
                        window.location.reload();
                    }
                });
                

            });
        <?php } ?>
    });
</script>
@endsection