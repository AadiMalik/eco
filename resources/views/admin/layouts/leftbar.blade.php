<?php
$data=content();
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{url('admin/dashboard')}}">Eco</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      <li class="dropdown @if(Request::is('admin/dashboard')) active @endif">
        <a href="{{url('admin/dashboard')}}" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
      </li>
      {{-- <li class="dropdown">
        <a href="{{url('/')}}" class="nav-link"><i data-feather="monitor"></i><span>Main Page</span></a>
      </li> --}}

      </li>
      <li class="menu-header">Users</li>
      <li class="dropdown @if(Request::is('admin/user')) active @endif">
        <a href="{{url('admin/user')}}" class="nav-link"><i data-feather="users"></i><span>Users</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/address') || Request::is('admin/shipping')) active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Addresses</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('admin/address')}}">User Addresses</a></li>
          <li><a href="{{url('admin/shipping')}}">Shipping Addresses</a></li>
        </ul>
      </li>
      <li class="menu-header">Orders</li>
      <li class="dropdown @if(Request::is('admin/master')) active @endif">
        <a href="{{url('admin/master')}}" class="nav-link"><i data-feather="truck"></i><span>Orders</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/slave')) active @endif">
        <a href="{{url('admin/slave')}}" class="nav-link"><i data-feather="trello"></i><span>Product Order</span></a>
      </li>
      <li class="menu-header">Payments</li>
      <li class="dropdown @if(Request::is('admin/transaction')) active @endif">
        <a href="{{url('admin/transaction')}}" class="nav-link"><i data-feather="dollar-sign"></i><span>Transactions</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/transactiontype')) active @endif">
        <a href="{{url('admin/transactiontype')}}" class="nav-link"><i data-feather="credit-card"></i><span>Transaction Types</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/payment')) active @endif">
        <a href="{{url('admin/payment')}}" class="nav-link"><i data-feather="book-open"></i><span>Payment Information</span></a>
      </li>
      <li class="menu-header">Coupons</li>
      <li class="dropdown @if(Request::is('admin/coupon')) active @endif">
        <a href="{{url('admin/coupon')}}" class="nav-link"><i data-feather="umbrella"></i><span>Coupons</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/couponuse')) active @endif">
        <a href="{{url('admin/couponuse')}}" class="nav-link"><i data-feather="target"></i><span>Coupon Used</span></a>
      </li>
      <li class="menu-header">Products</li>
      <li class="dropdown @if(Request::is('admin/product')) active @endif">
        <a href="{{url('admin/product')}}" class="nav-link"><i data-feather="package"></i><span>All Products</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/productimage')) active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Product Accessories</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('admin/productimage')}}">Product Images</a></li>
          {{-- <li><a href="{{url('admin/productcolor')}}">Product Colors</a></li>
          <li><a href="{{url('admin/productsize')}}">Product Sizes</a></li> --}}
        </ul>
      </li>
      <li class="menu-header">Services</li>
      <li class="dropdown @if(Request::is('admin/service')) active @endif">
        <a href="{{url('admin/service')}}" class="nav-link"><i data-feather="rss"></i><span>Service</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/company')) active @endif">
        <a href="{{url('admin/company')}}" class="nav-link"><i data-feather="award"></i><span>Companies</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/brand')) active @endif">
        <a href="{{url('admin/brand')}}" class="nav-link"><i data-feather="award"></i><span>Our Brands</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/team')) active @endif">
        <a href="{{url('admin/team')}}" class="nav-link"><i data-feather="user-check"></i><span>Our Team</span></a>
      </li>
      <li class="menu-header">Website Contents</li>
      <li class="dropdown @if(Request::is('admin/content')) active @endif">
        <a href="{{url('admin/content')}}" class="nav-link"><i data-feather="copy"></i><span>Contents</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/blog')) active @endif">
        <a href="{{url('admin/blog')}}" class="nav-link"><i data-feather="slack"></i><span>Our Blogs</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/link')) active @endif">
        <a href="{{url('admin/link')}}" class="nav-link"><i data-feather="facebook"></i><span>Social Media</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/slider')) active @endif">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i><span>Sliders</span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('admin/slider')}}">Main Slider</a></li>
          {{-- <li><a href="{{url('admin/aboutslider')}}">About Slider</a></li> --}}
        </ul>
      </li>
      <li class="menu-header">Address</li>
      <li class="dropdown @if(Request::is('admin/country')) active @endif">
        <a href="{{url('admin/country')}}" class="nav-link"><i data-feather="globe"></i><span>Countries</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/state')) active @endif">
        <a href="{{url('admin/state')}}" class="nav-link"><i data-feather="git-merge"></i><span>States</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/city')) active @endif">
        <a href="{{url('admin/city')}}" class="nav-link"><i data-feather="git-pull-request"></i><span>Cities</span></a>
      </li>
      <li class="menu-header">Accessories</li>
      {{-- <li class="dropdown">
        <a href="{{url('admin/color')}}" class="nav-link"><i data-feather="copy"></i><span>Colors</span></a>
      </li>
      <li class="dropdown">
        <a href="{{url('admin/size')}}" class="nav-link"><i data-feather="layers"></i><span>Sizes</span></a>
      </li> --}}
      <li class="dropdown @if(Request::is('admin/menu')) active @endif")>
        <a href="{{url('admin/menu')}}" class="nav-link"><i data-feather="menu"></i><span>Product Category</span></a>
      </li>
      {{-- <li class="dropdown">
        <a href="{{url('admin/macromenu')}}" class="nav-link"><i data-feather="list"></i><span>Category</span></a>
      </li>
      <li class="dropdown">
        <a href="{{url('admin/micromenu')}}" class="nav-link"><i data-feather="sliders"></i><span>Sub Category</span></a>
      </li> --}}
      <li class="menu-header">Messages</li>
      <li class="dropdown @if(Request::is('admin/contact')) active @endif">
        <a href="{{url('admin/contact')}}" class="nav-link"><i data-feather="mail"></i><span>Contact Mail</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/comment')) active @endif">
        <a href="{{url('admin/comment')}}" class="nav-link"><i data-feather="message-square"></i><span>Comments</span></a>
      </li>
      <li class="menu-header">Other</li>
      {{-- <li class="dropdown">
        <a href="{{url('admin/visitor')}}" class="nav-link"><i data-feather="eye"></i><span>Visitors</span></a>
      </li> --}}
      <li class="dropdown @if(Request::is('admin/term')) active @endif">
        <a href="{{url('admin/term')}}" class="nav-link"><i data-feather="alert-octagon"></i><span>Term & Conditions</span></a>
      </li>
      <li class="dropdown @if(Request::is('admin/faq')) active @endif">
        <a href="{{url('admin/faq')}}" class="nav-link"><i data-feather="help-circle"></i><span>FAQ</span></a>
      </li>

      <hr />
      <hr />
    </ul>
  </aside>
</div>