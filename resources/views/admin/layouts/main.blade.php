<?php
$data=content();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eco</title>
    @include('admin/layouts.css')
</head>

<body>
    <!-- <div class="loader"></div> -->
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin/layouts.navbar')
            @include('admin/layouts.leftbar')
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
                @include('admin/layouts.rightbar')
            </div>
            @include('admin/layouts.footer')
        </div>
    </div>
    @include('admin/layouts.js')
    @yield('after-script')
</body>

</html>