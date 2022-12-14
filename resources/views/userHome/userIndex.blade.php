<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="/images/favicon.png" type="">
    <title>Sriyani Text</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('userhome/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('userhome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('userhome/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('userhome/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('userHome.components.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('userHome.components.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('userHome.components.whySection')
    <!-- end why section -->

    <!-- arrival section -->
    @include('userHome.components.arrivals')
    <!-- end arrival section -->

    <!-- product section -->
    @include('userHome.components.products')
    <!-- end product section -->

    <!-- subscribe section -->
    @include('userHome.components.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('userHome.components.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('userHome.components.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <br>

            Sriyani Textile

        </p>
    </div>
    <!-- jQery -->
    <script src="{{asset('userhome/js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('userhome/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('userhome/js/bootstrap.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('userhome/js/custom.js')}}"></script>
</body>

</html>