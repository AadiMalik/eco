<?php
$data = content();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/'.$data['#favicon']['image'])}}" type="image/gif" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$data['#logo']['heading']}}</title>
    @include('user/layouts.css')
</head>
<body>
    <!-- Body main wrapper start -->
    <div class="wrapper home-one">
    @include('user/layouts.navbar')
    @yield('content')
    @include('user/layouts.footer')

    </div>
    
    @include('user/layouts.js')
    @yield('after-script')
</body>
</html>