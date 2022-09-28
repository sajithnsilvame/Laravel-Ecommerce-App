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
        }

        .confirm_btn {
            align-items: center;
        }

        .top_space {
            margin: 55px 0px 65px 0px;
        }
    </style>
</head>

<body>

    <!-- header section strats -->
    @include('userHome.header')
    <!-- end header section -->



    <div class="top_space" style="font-family: 'Poppins', sans-serif;">
        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 center">

            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h5 class="mb-10 ml-4" style="font-size: 32px; font-family: 'Poppins', sans-serif;">
            Fill your Shipping Details Here</h5>
            <form class="mx-1 mx-md-4" action="{{url('confirm-order')}}" method="post">

                @csrf

                <div class="d-flex flex-row align-items-center mb-2">

                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label">Your Email</label>
                        <input type="email" id="email" name="email" required value="{{$user->email}}" />

                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">

                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label">Your Name</label>
                        <input type="text" id="name" name="name" required value="{{$user->name}}" />
                        
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">

                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label">Contact Number</label>
                        <input type="text" id="email" name="contactNumber" required value="{{$user->phone}}" />

                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">

                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label">Deliver Address</label>
                        <input type="text" id="email" name="deliverAddress" required value="{{$user->address}}" />

                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">

                    <div class="form-outline flex-fill mb-0">
                        <label class="form-label">Description (optional)</label>
                        <textarea name="additional" rows="4" cols="50"></textarea>

                    </div>
                </div>

                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" class="btn btn-primary" name="submit" value="confirm and place my order">
                </div>

            </form>

        </div>

    </div>


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