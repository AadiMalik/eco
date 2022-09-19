@extends('user/layouts.main')
@section('content')
<!--breadcumb area start -->
<div class="breadcumb-area overlay pos-rltv">
    <div class="bread-main">
        <div class="bred-hading text-center">
            <h5>Register</h5>
        </div>
        <ol class="breadcrumb">
            <li class="home"><a title="Go to Home Page" href="{{url('/')}}">Home</a></li>
            <li class="active">Register</li>
        </ol>
    </div>
</div>
<!--breadcumb area end -->

<!-- Account Area Start -->
<div class="account-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6 lr2">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-reg">
                        <h3>Register</h3>
                        <div class="alert alert-danger" style="border-radius: 0px;">
                            <b>Note:</b> Password Send to your email address!
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-box mb-20">
                                    <label for="fname" class="control-label">First Name</label>
                                    <input type="text" id="fname" class="info @error('fname') is-invalid @enderror" placeholder="First Name" value="{{old('fname')}}" name="fname" required autocomplete="fname">
                                    @error('fname')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-box mb-20">
                                    <label for="lname" class="control-label">Last Name</label>
                                    <input type="text" id="lname" class="info @error('lname') is-invalid @enderror" placeholder="Last Name" value="{{old('lname')}}" name="lname" required autocomplete="lname">
                                    @error('lname')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="input-box mb-20">
                            <label for="email" class="control-label">E-Mail</label>
                            <input type="email" id="email" class="info @error('email') is-invalid @enderror" placeholder="E-Mail" value="{{old('email')}}" name="email" required autocomplete="email">
                            @error('email')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-box mb-20">
                            <label for="phone" class="control-label">Phone No</label>
                            <input type="text" id="phone" class="info" placeholder="Phone No" value="{{old('phone')}}" name="phone" required autocomplete="phone">
                            @error('phone')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="frm-action">
                        <div class="input-box tci-box">
                            <button type="submit" class="btn btn-danger">{{ __('Register') }}</button>
                        </div>
                        <a href="#" class="forgotten forg">If have account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Account Area End -->
@endsection