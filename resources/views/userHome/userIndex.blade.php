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
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Sriyani Text</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="userhome/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="userhome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="userhome/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="userhome/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('userHome.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('userHome.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('userHome.whySection')
    <!-- end why section -->

    <!-- arrival section -->
    @include('userHome.arrivals')
    <!-- end arrival section -->

    <!-- product section -->
    @include('userHome.products')
    <!-- end product section -->

    <!-- subscribe section -->
    @include('userHome.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('userHome.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('userHome.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <br>

            Sriyani Textile

        </p>
    </div>
    <!-- jQery -->
    <script src="userhome/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="userhome/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="userhome/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="userhome/js/custom.js"></script>
</body>

</html>