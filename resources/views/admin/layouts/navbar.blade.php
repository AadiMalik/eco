<?php
$contact = contact();
$order = order();
?>

<nav class="navbar navbar-expand-lg main-navbar sticky">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
      <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
          <i data-feather="maximize"></i>
        </a></li>
    </ul>
  </div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
        <span class="badge headerBadge1">
          {{count($contact)}} </span> </a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header">
          Messages
        </div>
        <div class="dropdown-list-content dropdown-list-message">
          @if(count($contact)!=null)
          @foreach($contact as $item)
          <a href="{{url('admin/contact')}}" class="dropdown-item">
          <span class="dropdown-item-icon bg-primary text-white"> <i class="fas fa-user"></i></span>
            <div class="dropdown-item" style="padding:0px;">
              <span class="dropdown-item-desc">
                <span class="message-user">
                  {{$item->name}}
                </span>
                <span class="time messege-text" style="height: 35px; overflow:hidden;">{{$item->message}}</span>
                <span class="time">{{$item->created_at}}</span>
              </span>
            </div>
            @endforeach
            @else
            <span>No Messages</span>
            @endif
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="{{url('admin/contact')}}">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link message-toggle nav-link-lg"><i data-feather="bell"></i>
        <span class="badge headerBadge1">
          {{count($order)}} </span></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
        <div class="dropdown-header">
          Order Notifications
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
          @foreach ($order as $item)
          <a href="#" class="dropdown-item dropdown-item-unread">
             <span class="dropdown-item-icon bg-primary text-white"> <i class="fas fa-bell"></i></span>
             <span class="dropdown-item-desc">{{$item->user_name->fname}} {{$item->user_name->lname}}
              <span class="time">{{$item->created_at}}</span>
            </span>
          </a>
            @endforeach
        </div>
        <div class="dropdown-footer text-center">
          <a href="{{url('admin/master')}}">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    <li class="dropdown">
      <a href="{{url('admin/profile')}}" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        @if(auth()->user()->image==null)
        <img alt="image" src="{{asset('assets/img/users/user-3.png')}}" class="user-img-radious-style">
        @else
        <img alt="image" src="{{asset('img/'.auth()->user->image)}}" class="user-img-radious-style">
        @endif
        <span class="d-sm-none d-lg-inline-block"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">Hello {{auth()->user()->fname}} {{auth()->user()->lname}}</div>
        <a href="{{url('admin/profile')}}" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
        </a>
        {{-- <a href="{{url('/')}}" class="dropdown-item has-icon"> <i class="fas fa-laptop"></i>
          Main Page
        </a> --}}
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>

      </div>
    </li>
  </ul>
</nav>