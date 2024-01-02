<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('/assets/front-end')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/assets/front-end')}}/css/site.css">
</head>
<body>
    @include('layouts.front-end.partials._modals')
<header>
    <!-- Header Start -->
    @include('layouts.front-end.partials._header')
    <!-- Header End -->
</header>
<div class="container-fluid">
        <main role="main" class="pb-3 min-height">
        <!-- Page Content-->
             @yield('content')
        </main>
</div>
<footer class="bd-footer py-4 mt-5 bg-light border-top">
    <!--? Footer Start-->
    @include('layouts.front-end.partials._footer')
    <!-- Footer End-->
</footer>


 <!-- JS here -->

 <script src="{{asset('/assets/front-end')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('/assets/front-end')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/popper.min.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('/assets/front-end')}}/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('/assets/front-end')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('/assets/front-end')}}/js/wow.min.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/animated.headline.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="{{asset('/assets/front-end')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="{{asset('/assets/front-end')}}/js/contact.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/jquery.form.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/jquery.validate.min.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/mail-script.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{asset('/assets/front-end')}}/js/plugins.js"></script>
    <script src="{{asset('/assets/front-end')}}/js/main.js"></script>
    <script src="{{asset('/assets/login')}}/js/toastr.js"></script>
    
</body>
</html>