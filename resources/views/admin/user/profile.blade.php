@extends('admin/layouts.main')
@section('content')

<!-- Main Content -->
<div>
    <section class="section">
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card author-box">
                        <div class="card-body">
                            <div class="author-box-center">
                                @if(auth()->user()->image==null)
                                <img alt="image" src="{{asset('assets/img/users/user-3.png')}}" class="rounded-circle author-box-picture">
                                @else
                                <img alt="image" src="{{asset('img/'.auth()->user()->image)}}" class="rounded-circle author-box-picture">\
                                @endif
                                <div class="clearfix"></div>
                                <div class="author-box-name">
                                    <a href="#">{{auth()->user()->fname}} {{auth()->user()->lname}}</a>
                                </div>
                                <div class="author-box-job">Administrator</div>
                            </div>
                            <div class="text-center">
                                <div class="author-box-description">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                                        minus quod dignissimos.
                                    </p>
                                </div>


                                <div class="w-100 d-sm-none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Personal Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Account Created
                                    </span>
                                    <span class="float-right text-muted">
                                        {{auth()->user()->created_at}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Phone
                                    </span>
                                    <span class="float-right text-muted">
                                        {{auth()->user()->phone}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Mail
                                    </span>
                                    <span class="float-right text-muted">
                                        {{auth()->user()->email}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Country
                                    </span>
                                    <span class="float-right text-muted">
                                        @if ($address!=null)
                                        {{$address->country_name->name}}
                                        @else
                                        Empty
                                        @endif
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        State/Region
                                    </span>
                                    <span class="float-right text-muted">
                                        @if ($address!=null)
                                        {{$address->state_name->name}}
                                        @else
                                        Empty
                                        @endif
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        City
                                    </span>
                                    <span class="float-right text-muted">
                                        @if ($address!=null)
                                        {{$address->city_name->name}}
                                        @else
                                        Empty
                                        @endif
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Zip Code
                                    </span>
                                    <span class="float-right text-muted">
                                        @if ($address!=null)
                                        {{$address->zipcode}}
                                        @else
                                        Empty
                                        @endif
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Home Address
                                    </span>
                                    <span class="float-right text-muted">
                                        @if ($address!=null)
                                        {{$address->address}}
                                        @else
                                        Empty
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card">
                  <div class="card-header">
                    <h4>Skills</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Java</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-primary" data-width="70%"></div>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Web Design</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-warning" data-width="80%"></div>
                          </div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-body">
                          <div class="media-title">Photoshop</div>
                        </div>
                        <div class="media-progressbar p-t-10">
                          <div class="progress" data-height="6">
                            <div class="progress-bar bg-green" data-width="48%"></div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div> -->
                </div>
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="padding-20">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active" id="profile-tab2" data-toggle="tab" href="#info" role="tab" aria-selected="false">Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab2" data-toggle="tab" href="#picture" role="tab" aria-selected="true">Profile Picture</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab2" data-toggle="tab" href="#password" role="tab" aria-selected="true">Change Password</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="home-tab2">
                                    <form action="{{url('admin/password')}}" method="POST">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Change Password</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group ">
                                                <label>New Password <span style="color:red;">*</span></label>
                                                <input type="password" name="password" class="form-control">
                                                {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
                                            </div>
                                            <div class="form-group ">
                                                <label>Re-Type Password <span style="color:red;">*</span></label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="picture" role="tabpanel" aria-labelledby="home-tab2">
                                    <form action="{{url('admin/picture')}}" method="POST">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Change Profile Picture</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group ">
                                                <label>Profile Picture <span style="color:red;">*</span></label>
                                                <input type="file" name="image" class="form-control">
                                                {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="profile-tab2">
                                    <form action="{{url('admin/info')}}" method="POST" class="needs-validation">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Personal Information</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>First Name <span style="color:red;">*</span></label>
                                                    <input type="text" name="fname" class="form-control" value="{{auth()->user()->fname}}">
                                                    {!!$errors->first("fname", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Last Name <span style="color:red;">*</span></label>
                                                    <input type="text" name="lname" class="form-control" value="{{auth()->user()->lname}}">
                                                    {!!$errors->first("lname", "<span class='text-danger'>:message</span>")!!}

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Email</label>
                                                    <input type="email" disabled class="form-control" value="{{auth()->user()->email}}">
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label>Phone</label>
                                                    <input type="tel" disabled class="form-control" value="{{auth()->user()->phone}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Select Country <span style="color:red;">*</span></label>
                                                    <select name="country" class="form-control select2">
                                                        @foreach ($country as $item)
                                                        <option value="{{$item->id}}" @if($address!=null) @if($address->country_id==$item->id) selected @endif @endif>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Select State <span style="color:red;">*</span></label>
                                                    <select name="state" class="form-control select2">
                                                        @foreach ($state as $item)
                                                        <option value="{{$item->id}}" @if($address!=null) @if($address->state_id==$item->id) selected @endif @endif>{{$item->name}} ({{$item->country_name->name}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Select City <span style="color:red;">*</span></label>
                                                    <select name="city" class="form-control select2">
                                                        @foreach ($city as $item)
                                                        <option value="{{$item->id}}" @if($address!=null) @if($address->city_id==$item->id) selected @endif @endif>{{$item->name}} ({{$item->state_name->name}}) ({{$item->state_name->country_name->name}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Zip Code <span style="color:red;">*</span></label>
                                                    <input type="text" name="zipcode" value=" @if($address!=null) {{$address->zipcode}} @endif" class="form-control">
                                                    {!!$errors->first("zipcode", "<span class='text-danger'>:message</span>")!!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Home Address <span style="color:red;">*</span></label>
                                                <input type="text" name="address" value=" @if($address!=null) {{$address->address}} @endif" class="form-control">
                                                {!!$errors->first("address", "<span class='text-danger'>:message</span>")!!}
                                            </div>
                                            <div class="form-group">
                                                <label>Office Address</label>
                                                <input type="text" name="shipping" value=" @if($address!=null) {{$address->shipping}} @endif" class="form-control">
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
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
</section>
<div class="settingSidebar">
    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
    </a>
    <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
            <div class="setting-panel-header">Setting Panel
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                    <label class="selectgroup-item">
                        <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                        <span class="selectgroup-button">Light</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                        <span class="selectgroup-button">Dark</span>
                    </label>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                    <label class="selectgroup-item">
                        <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                    </label>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                    <ul class="choose-theme list-unstyled mb-0">
                        <li title="white" class="active">
                            <div class="white"></div>
                        </li>
                        <li title="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li title="black">
                            <div class="black"></div>
                        </li>
                        <li title="purple">
                            <div class="purple"></div>
                        </li>
                        <li title="orange">
                            <div class="orange"></div>
                        </li>
                        <li title="green">
                            <div class="green"></div>
                        </li>
                        <li title="red">
                            <div class="red"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                    <label class="m-b-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                        <span class="custom-switch-indicator"></span>
                        <span class="control-label p-l-10">Mini Sidebar</span>
                    </label>
                </div>
            </div>
            <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                    <label class="m-b-0">
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                        <span class="custom-switch-indicator"></span>
                        <span class="control-label p-l-10">Sticky Header</span>
                    </label>
                </div>
            </div>
            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                    <i class="fas fa-undo"></i> Restore Default
                </a>
            </div>
        </div>
    </div>
</div>
</div>


@endsection