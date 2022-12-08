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

    <!-- sweet alert cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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
    @include('userHome.components.header')
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
                    <td class="td_des ">
                        <a href="{{url('remove-product-from-cart', $cart->id)}}" class="btn btn-danger" onclick="confirmation(event)"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>
                    </td>


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
    <!-- Sweet Alert confirmation -->
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                    title: "Remove Item from the Cart",
                    text: "Are you sure that remove this item from your cart?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,

                })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });

        }
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