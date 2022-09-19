<?php
$data =content();
?>
@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv" style="background: rgba(0, 0, 0, 0) url({{asset('img/'.$data['#accounttop']['image'])}}) no-repeat scroll 0 0;">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>{{$data['#accounttop']['heading']}}</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">{{$data['#accounttop']['heading']}}</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!--service idea area are start -->
<div class="idea-area  ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="idea-tab-menu">
                    <ul class="nav idea-tab" role="tablist">
                        <li>
                            @if (auth()->user()->image!=null)
                            <img src="{{asset('img/'.auth()->user()->image)}}" style="width:100%; height:300px;" alt="">
                            @else
                            <img src="{{asset('images/blog/demo.jpg')}}" style="width:100%; height:300px;" alt="">
                            @endif
                        </li>
                        <li role="presentation"><a class="active" href="#creativity" aria-controls="creativity" role="tab" data-toggle="tab">{{$data['#accountpersonal']['heading']}}</a></li>
                        <li role="presentation"><a href="#picture" aria-controls="picture" role="tab" data-toggle="tab">{{$data['#accountpicture']['heading']}}</a></li>
                        <li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">{{$data['#accountpassword']['heading']}}</a></li>
                        <li role="presentation"><a href="#ideas" aria-controls="ideas" role="tab" data-toggle="tab">{{$data['#accountshipping']['heading']}}</a></li>
                        <li role="presentation"><a href="#design" aria-controls="design" role="tab" data-toggle="tab">{{$data['#accountorders']['heading']}}</a></li>
                        <li role="presentation"><a href="#devlopment" aria-controls="devlopment" role="tab" data-toggle="tab">{{$data['#accounttransactions']['heading']}}</a></li>
                        <li role="presentation"><a href="#markenting" aria-controls="markenting" role="tab" data-toggle="tab">{{$data['#accountaddtransaction']['heading']}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                @if(session('success'))
                <div class="alert alert-success" id="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger" id="alert">
                    {{ session('error') }}
                </div>
                @endif
                <div class="idea-tab-content">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="creativity">
                            <h3 style="font-weight: bold;">{{$data['#accountpersonal']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <form action="{{url('user/profile')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>First Name <em style="color:red;">*</em></label>
                                            <input type="text" name="fname" value="{{auth()->user()->fname}}" class="info" placeholder="First Name">
                                            {!!$errors->first("fname", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Last Name <em style="color:red;">*</em></label>
                                            <input type="text" name="lname" value="{{auth()->user()->lname}}" class="info" placeholder="Last Name">
                                            {!!$errors->first("lname", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>E-Mail <em style="color:red;">(not change)</em></label>
                                            <input type="text" disabled value="{{auth()->user()->email}}" class="info" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Phone Number <em style="color:red;">(not change)</em></label>
                                            <input type="text" disabled value="{{auth()->user()->phone}}" class="info" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Country<em style="color:red;">*</em></label>
                                            <select name="country" class="selectpicker select-custom" data-live-search="true">
                                                @foreach ($country as $item)
                                                <option value="{{$item->id}}" @if($item->id==$address->country_id) selected @endif>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            {!!$errors->first("country", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>State/Divison<em style="color:red;">*</em></label>
                                            <select name="state" class="selectpicker select-custom" data-live-search="true">
                                                @foreach ($state as $item)
                                                <option value="{{$item->id}}" @if($item->id==$address->state_id) selected @endif>{{$item->name}} ({{$item->country_name->name}})</option>
                                                @endforeach
                                            </select>
                                            {!!$errors->first("state", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Town/City<em style="color:red;">*</em></label>
                                            <select name="city" class="selectpicker select-custom" data-live-search="true">
                                                @foreach ($city as $item)
                                                <option value="{{$item->id}}" @if($item->id==$address->city_id) selected @endif>{{$item->name}} ({{$item->state_name->name}}) ({{$item->state_name->country_name->name}})</option>
                                                @endforeach
                                            </select>
                                            {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Post Code/Zip Code<em style="color:red;">*</em></label>
                                            <input type="text" name="zipcode" value="{{$address->zipcode}}" class="info" placeholder="Zip Code">
                                            {!!$errors->first("zipcode", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box mb-20">
                                            <label>Home Address<em style="color:red;">*</em></label>
                                            <input type="text" name="address" value="{{$address->address}}" class="info mb-10" placeholder="Street Address">
                                            {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box mb-20">
                                            <label>Office Address</label>
                                            <input type="text" name="shipping" value="{{$address->shipping}}" class="info mt10" placeholder="Apartment, suite, unit etc. (optional)">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                    </div>
                                    <div class="col-lg-6 col-md-4 text-right">
                                        <button class="btn btn-dark btn2">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="picture">
                            <h3 style="font-weight: bold;">{{$data['#accountpicture']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <form action="{{url('user/picture')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-box mb-20">
                                            <label>Profile Picture<em style="color:red;">*</em></label>
                                            <input type="file" name="image" class="info">
                                            {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                    </div>
                                    <div class="col-lg-6 col-md-4 text-right">
                                        <button class="btn btn-dark btn2">Change Picture</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="password">
                            <h3 style="font-weight: bold;">{{$data['#accountpassword']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <form action="{{url('user/password')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-box mb-20">
                                            <label>New Password<em style="color:red;">*</em></label>
                                            <input type="password" name="password" placeholder="New Password" class="info">
                                            {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-box mb-20">
                                            <label>Confirm Password<em style="color:red;">*</em></label>
                                            <input type="password" name="confirm_password" placeholder="Confirm Password" class="info">
                                            {!!$errors->first("confirm_password", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                    </div>
                                    <div class="col-lg-6 col-md-4 text-right">
                                        <button class="btn btn-dark btn2">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="ideas">
                            <h3 style="font-weight: bold;">{{$data['#accountshipping']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <form action="{{url('user/shipping')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>First Name<em style="color:red;">*</em></label>
                                            <input type="text" name="fname" value=" @if($ship!=null) {{$ship->fname}} @else {{old('fname')}} @endif" class="info">
                                            {!!$errors->first("fname", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Last Name<em style="color:red;">*</em></label>
                                            <input type="text" name="lname" value=" @if($ship!=null) {{$ship->lname}} @else {{old('lname')}} @endif" class="info">
                                            {!!$errors->first("lname", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Email Address<em style="color:red;">*</em></label>
                                            <input type="text" name="email" value=" @if($ship!=null) {{$ship->email}} @else {{old('email')}} @endif" class="info">
                                            {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Phone Number<em style="color:red;">*</em></label>
                                            <input type="text" name="phone" value=" @if($ship!=null) {{$ship->phone}} @else {{old('phone')}} @endif" class="info">
                                            {!!$errors->first("phone", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Country<em style="color:red;">*</em></label>
                                            <select name="country" class="selectpicker select-custom" data-live-search="true">
                                                @foreach ($country as $item)
                                                <option value="{{$item->id}}" @if($ship!=null) @if($item->id==$ship->country_id) selected @endif @endif>{{$item->name}}</option>
                                                @endforeach
                                                {!!$errors->first("country", "<span class='text-danger'>:message</span>")!!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>State/Divison<em style="color:red;">*</em></label>
                                            <select name="state" class="selectpicker select-custom" data-live-search="true">
                                                @foreach ($state as $item)
                                                <option value="{{$item->id}}" @if($ship!=null) @if($item->id==$ship->state_id) selected @endif @endif>{{$item->name}} ({{$item->country_name->name}})</option>
                                                @endforeach
                                                {!!$errors->first("state", "<span class='text-danger'>:message</span>")!!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Town/City<em style="color:red;">*</em></label>
                                            <select name="city" class="selectpicker select-custom" data-live-search="true">
                                                @foreach ($city as $item)
                                                <option value="{{$item->id}}" @if($ship!=null) @if($item->id==$ship->city_id) selected @endif @endif>{{$item->name}} ({{$item->state_name->name}}) ({{$item->state_name->country_name->name}})</option>
                                                @endforeach
                                                {!!$errors->first("city", "<span class='text-danger'>:message</span>")!!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box mb-20">
                                            <label>Post Code/Zip Code<em style="color:red;">*</em></label>
                                            <input type="text" name="zipcode" value=" @if($ship!=null) {{$ship->zipcode}} @else {{old('zipcode')}} @endif" class="info">
                                            {!!$errors->first("zipcode", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box mb-20">
                                            <label>Address<em style="color:red;">*</em></label>
                                            <input type="text" name="address" value=" @if($ship!=null) {{$ship->address}} @else {{old('address')}} @endif" class="info mb-10">
                                            {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-8">
                                    </div>
                                    <div class="col-lg-6 col-md-4 text-right">
                                        <button class="btn btn-dark btn2">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="design">
                            <h3 style="font-weight: bold;">{{$data['#accountorders']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Invoice #</th>
                                            <th>Payment</th>
                                            <th>QTY</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Process</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($master as $item)
                                        <tr>
                                            <td>{{$item->invoice}}</td>
                                            <td>
                                                @if($item->method_id!=null)
                                                {{$item->method_name->name}}
                                                @else
                                                Cash on Delivery
                                                @endif
                                            </td>
                                            <td style="text-align: right;">{{$item->qty}}</td>
                                            <td style="text-align: right;">{{$item->sub_total}}</td>
                                            <td style="text-align: right;">{{$item->discount}}</td>
                                            <td style="text-align: right;">{{$item->total}}</td>
                                            <td>
                                                @if($item->address==3)
                                                Other
                                                @elseif ($item->address==2)
                                                Office
                                                @else
                                                Home
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status==2)
                                                <span class="badge badge-success">Active</span>
                                                @elseif ($item->status==1)
                                                <span class="badge badge-danger">Cancel</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->process==3)
                                                <span class="badge badge-info">Processing</span>
                                                @elseif ($item->process==2)
                                                <span class="badge badge-primary">On the Way</span>
                                                @elseif ($item->process==4)
                                                <span class="badge badge-danger">Stop</span>
                                                @else
                                                <span class="badge badge-success">Delivered</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if ($item->status==1 || $item->process==2 || $item->process ==1)
                                                No Actions
                                                @else
                                                <form action="{{url('user/cancelorder/'.$item->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="order_id" value="{{$item->id}}" />
                                                    <button href="{{route('master.edit',$item['id'])}}" class="btn btn-danger"><span class="fa fa-close"></span> Cancel</a>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="devlopment">
                            <h3 style="font-weight: bold;">{{$data['#accounttransactions']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Invoice #</th>
                                            <th>Transaction ID</th>
                                            <th>Method</th>
                                            <th>Amount</th>
                                            <th>Slip</th>
                                            <th>Process</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $item)

                                        <tr>
                                            <td>{{$item->invoice}}</td>
                                            <td>{{$item->transaction}}</td>
                                            <td>{{$item->method_name->name}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>
                                                @if($item->slip!=null)
                                                <a href="{{asset('img/'.$item->slip)}}"> <img src="{{asset('img/'.$item->slip)}}" width="100" height="100" alt=""></a>
                                                @else
                                                No Slip
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->process==3)
                                                <span class="badge badge-primary">Pending</span>
                                                @elseif($item->process==2)
                                                <span class="badge badge-success">Paid</span>
                                                @else
                                                <span class="badge badge-danger">Cancel</span>
                                                @endif
                                            </td>
                                            <td>{{$item->reason}}</td>
                                            <td>
                                                @if ($item->process!=1)
                                                <form action="{{url('user/transationdelete/'.$item->id)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><span class="fa fa-close"></span> Cancel</button>
                                                </form>
                                                @else
                                                No Actions
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="markenting">
                            <h3 style="font-weight: bold;">{{$data['#accountaddtransaction']['heading']}}</h3>
                            <hr style="margin: 20px 0px;" />
                            <form action="{{url('user/addtransaction')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-box mb-20">
                                                    <label>Invoice # <em>*</em></label>
                                                    <input type="text" name="invoice" value="{{old('invoice')}}" class="info" placeholder="Invoice #">
                                                    {!!$errors->first("invoice", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-box mb-20">
                                                    <label>Payment Methods <em>*</em></label>
                                                    <select name="method" class="selectpicker select-custom" data-live-search="true">
                                                        @foreach ($transactiontype as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {!!$errors->first("method", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box mb-20">
                                                    <label>Transation ID <em>*</em></label>
                                                    <input type="text" name="id" value="{{old('id')}}" class="info" placeholder="Transaction ID">
                                                    {!!$errors->first("id", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-box mb-20">
                                                    <label>Amount <em>*</em></label>
                                                    <input type="number" name="amount" value="{{old('amount')}}" class="info" placeholder="Sending Amount">
                                                    {!!$errors->first("amount", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-box mb-20">
                                                    <label>Slip </label>
                                                    <input type="file" name="slip" class="info">
                                                    {!!$errors->first("slip", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="payment-btn-area mt-20 row">
                                                    <div class="col-md-4 text-left">
                                                        <button class="btn btn-dark btn2">Save</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        @foreach ($payment as $item)
                                        <div class="alert alert-success">
                                            <h4>{{$item->heading}}</h4>
                                            {!!$item->description!!}
                                        </div>
                                        @endforeach
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
<!--service idea area are end -->
@endsection
@section('after-script')
<script>
    $("#alert").delay(5000).slideUp(300);
</script>
<script>
    function transactionDelete(id) {
        swal({
            title: "Are You Sure Want To Delete ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var url = '{{ url("transaction", ":id") }}';
                url = url.replace(':id', id);
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: url,
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        //var data = JSON.parse(response);
                        iziToast.success({
                            message: data.message,
                            position: 'topRight'
                        });
                        //Reload page
                        window.location.reload();

                    }
                });
            }
        });

    }
</script>
@endsection