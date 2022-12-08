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

    <style>
        .search_bar {
            color: black;
            width: 50em;
        }

        .no_products{
            margin-left: 31em;
        }
    </style>
</head>

<body>

    <section class="product_section layout_padding ">
        <div class="container">
            
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
                <div>
                    <form action="{{url('search-products')}}" method="GET">
                        @csrf
                        <div>
                            <input type="text" placeholder="Search by Categories" class="mt-6 search_bar" name="search">
                            <input type="submit" value="search">
                        </div>

                    </form>
                    
                </div>
                    
            </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
            <div class="row">

                @forelse($productList as $productLists)
                <div class="col-sm-6 col-md-4 col-lg-4 hover">
                    <div class="box" style="box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2), 0 2px 4px 1px rgba(0, 0, 0, 0.11);">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{url('product-details', $productLists->id)}}" class="option1">
                                    Product Details
                                </a>

                            </div>
                        </div>
                        <div class="img-box">
                            <img src="/product_img/{{$productLists->image}}">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$productLists->title}}
                            </h5>
                        </div>

                        @if($productLists->discount_price != null)

                        <h6 style="color: red;">
                            <p>Discount Price Rs {{$productLists->discount_price}}</p>

                        </h6>

                        <h6 style="text-decoration: line-through; color: blue;">
                            <p style="color: blue;">Price Rs {{$productLists->price}}</p>

                        </h6>

                        @else
                        <h6 style="color: blue;">
                            <p style="color: blue;">Price </p>
                            Rs {{$productLists->price}}
                        </h6>

                        @endif
                        <p>
                            Available quantity : {{$productLists->quantity}}
                        </p>

                    </div>

                    <div class="mt-4 ml-20">
                        <form action="{{url('add-cart', $productLists->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mt-1 mr-2">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                                </div>
                                <div class="ml-2">
                                    <input type="submit" value="Add to cart" class="option2">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <div class="no_products">
                    <h2>No Products</h2>
                </div>
                @endforelse

                <span style="padding-top: 20px; ">

                    <!-- paginate start -->
                    {!!$productList->withQueryString()->links('pagination::bootstrap-5')!!}
                    <!-- paginate end -->

                </span>
            </div>
        </div>
    </section>


    <!-- Refresh Page and Keep Scroll Position -->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

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