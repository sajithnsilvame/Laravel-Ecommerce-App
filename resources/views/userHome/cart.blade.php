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
    


    <style>
        body {
            font-family: 'Poppins', sans-serif;

        }

        .center {
            margin: auto;
            width: 50%;
        }

        .td_des {
            background-color: #e8eded;
        }

        .font-size {
            font-size: 22px;
            /* font-family: 'Poppins', sans-serif; */
        }
    </style>
</head>

<body>

    <!-- header section strats -->
    @include('userHome.header')
    <!-- end header section -->



    <div class="center mt-16 mb-44">
        <table class="table table-hover">
            <thead>
                <tr>

                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php $total_price = 0 ?>
                @foreach($cart as $cart)
                <tr>
                    <td class="td_des">{{$cart->product_title}}</td>
                    <td class="td_des">{{$cart->quantity}}</td>
                    <td class="td_des">Rs {{$cart->price}}</td>
                    <td class="td_des"><img width="100" src="/product_img/{{$cart->image}}" alt=""></td>
                    <td class="td_des "><a href="{{url('remove-product-from-cart', $cart->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?')"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></td>


                </tr>

                <?php $total_price = $total_price +  $cart->price ?>

                @endforeach
                <tr class="table-primary cursor-pointer">
                    <td colspan="4">Total Amount</td>
                    <td>Rs {{$total_price}}</td>
                </tr>

            </tbody>
        </table>

        <div class="mt-2 ml-72">
            <h1 class="font-size">proceed to order</h1>

        </div>

        <div class="mt-4 ml-56">
            @if($total_price != null)
            <a href="{{url('cash-on-delivery')}}" class="btn btn-primary"><i class="fa fa-handshake-o" aria-hidden="true"></i> Cash On delivery</a>
            <a href="{{url('card-payment',$total_price)}}" class="btn btn-info ml-3"><i class="fa fa-credit-card" aria-hidden="true"></i> Cadr Payment</a>
            @else
            <a href="" class="btn btn-primary" onclick="return false;"><i class="fa fa-handshake-o" aria-hidden="true"></i> Cash On delivery</a>
            <a href="" class="btn btn-info ml-3" onclick="return false;"><i class="fa fa-credit-card" aria-hidden="true"></i> Cadr Payment</a>
            @endif
        </div>


    </div>



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