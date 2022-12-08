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
        body {
            font-family: 'Poppins', sans-serif;

        }

        .center {
            margin: auto;
            width: 80%;
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
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session()->get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr>

                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Deliver status</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orders as $orders)
                <tr>
                    <td class="td_des">{{$orders->product_title}}</td>
                    <td class="td_des">{{$orders->quantity}}</td>
                    <td class="td_des">Rs {{$orders->price}}</td>
                    <td class="td_des"><img width="100" src="/product_img/{{$orders->image}}" alt=""></td>
                    <td class="td_des">
                        
                        @if ($orders->payment_status == 'Paid' or $orders->payment_status == 'Payment Received')
                            <h4 class="btn btn-success">success</h4>
                            @else
                            <h4 class="btn btn-warning">Cash On Deliver</h4>
                        @endif
                    </td>
                    <td class="td_des">
                        
                        @if ($orders->delivery_status == 'processing')
                            <h4 class="btn btn-info">processing..</h4>
                            @else
                            <h4 class="btn btn-success">Delivered</h4>
                        @endif
                    </td>
                    <td class="td_des "><a href="{{url('cancel-order', $orders->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to cancel this order?')"><i class="fa fa-trash" aria-hidden="true"></i> Cancel order</a></td>


                </tr>
                @endforeach
            </tbody>
        </table>

    </div>



    <div class="cpy_ mt-96">
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