<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <base href="/public">

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

    <style>
        body {
            display: grid;
            grid-template-rows: 1fr;
            font-family: "Raleway", sans-serif;
            background-color: #faf8f7;
        }

        h3 {
            font-size: 0.7em;
            letter-spacing: 1.2px;
            color: #000;
        }

        img {
            max-width: 100%;


        }

        /* ----- Product Section ----- */
        .product {
            display: grid;
            grid-template-columns: 0.9fr 1fr;
            margin: auto;
            padding: 2.5em 0;
            min-width: 600px;
            background-color: #e8eded;
            box-shadow: 4px 4px 25px -2px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }

        /* ----- Photo Section ----- */
        .product__photo {
            position: relative;
        }

        .pro_description {
            margin-right: 50px;
            width: 70vh;
        }



        .photo-main {
            border-radius: 6px 6px 0 0;

        }



        /* ----- Informations Section ----- */
        .product__info {
            padding: 0.8em 0;
        }



        .price {
            margin: 1.5em 0;
            color: #ff3f40;
            font-size: 1.2em;
            padding-left: 0.15em;

        }




        .buy--btn {
            padding: 1.5em 3.1em;
            border: none;
            border-radius: 7px;
            font-size: 0.8em;
            font-weight: 700;
            letter-spacing: 1.3px;
            color: #fff;
            background-color: #ff3f40;
            box-shadow: 2px 2px 25px -7px #4c4c4c;
            cursor: pointer;

        }

        /* ----- Footer Section ----- */
        footer {
            padding: 1em;
            text-align: center;
            color: #fff;


        }
    </style>
</head>



<body>

    <!-- header section strats -->
    @include('userHome.header')
    <!-- end header section -->


    <section class="product mt-10">
        <div class="product__photo">
            <div class="photo-container">
                <div class="photo-main">

                    <img width="400" height="350" style="padding: 20px;" src="product_img/{{$product->image}}">
                </div>

            </div>
        </div>
        <div class="product__info">
            <div class="title">
                <h1 style="font-size: 35px;">{{$product->title}}</h1>
                <span> Category: {{$product->category}}</span>
            </div>

            @if($product->discount_price!=null)

            <h6 style="color: red;" class="mt-4">
                <p>Discount Price</p>
                Rs {{$product->discount_price}}
            </h6>

            <h6 style="text-decoration: line-through; color: blue;" class="mt-2">

                Rs {{$product->price}}
            </h6>

            @else
            <h6 style="color: blue;">
                <p style="color: blue;">price</p>
                Rs {{$product->price}}
            </h6>

            @endif

            <div class="pro_description mt-6">
                <h3>Details</h3>
                {{$product->description}}
            </div>

            <!-- <button class="buy--btn mt-28"><a href="">ADD TO CART</a></button> -->
            <div class="mt-4">
                <form action="{{url('add-cart', $product->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mt-1">
                            <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                        </div>
                        <div class="-ml-8">
                            <input type="submit" value="Add to cart" class="option2">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <div>
        @include('userhome.products')
    </div>


    <!-- footer start -->
    @include('userHome.footer')
    <!-- footer end -->
    <div class="cpy_ mt-80">
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