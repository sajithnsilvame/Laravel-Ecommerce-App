<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sriyani Text</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}"/>

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
            width: 50%;
        }

        .img_size {
            width: 750px;
            height: 300px;
        }

        .table {
            margin: auto;
            width: 50%;
        }

        .font-color {
            color: white;
        }

        div.scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a:hover {
            background-color: #0ee848;
            outline-color: #0ee848;
        }

        .search_bar {
            color: black;
            width: 40em;
        }

        .no_products {
            margin-left: 31em;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.components.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.components.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <div class="div_center">
                        <h2 class="h2_font">All Orders</h2>

                        <form action="{{url('search-orders')}}" method="GET">
                            @csrf
                            <div>
                                <input type="text" placeholder="Enter Order Id" class="mt-6 search_bar" name="search">
                                <input type="submit" value="Search" class="btn btn-primary p-2">
                            </div>

                        </form>
                    </div>



                    <div class="mt-6 scrollmenu">
                        <table class="table">

                            <tr class="font-color">
                                <th>Order Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Aditional</th>
                                <th>Product Id</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Payment Status</th>
                                <th>Deliver Status</th>
                                <th>Hands on to Deliver</th>
                                <th>Invoice</th>
                            </tr>
                            @foreach($order as $order)
                            <tr class="font-color">
                                <td>{{$order->id}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->additional}}</td>
                                <td>{{$order->product_id}}</td>
                                <td>{{$order->product_title}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->size}}</td>
                                <td>Rs {{$order->price}}</td>
                                <td>  
                                    @if ($order->payment_status == 'Paid' or $order->payment_status == 'Payment Received')
                                        <h4 class="btn btn-success">success</h4>
                                    @else
                                        <h4 class="btn btn-warning">Cash on Deliver</h4>
                                    @endif
                                </td>
                                <td>
                                    @if ($order->delivery_status == 'processing')
                                        <h4 class="btn btn-danger">processing..</h4>
                                    @else
                                        <h4 class="btn btn-success">Delivered</h4>
                                    @endif
                                </td>

                                
                                
                                
                                <td>
                                    <form action="{{url('hand-on-order',$order->id)}}" method="post">
                                        @csrf

                                        @if ($order->hands_on == '0')
                                            <input type="submit" class="btn btn-success" value="Hand On">
                                            @else
                                            <input type="button" class="btn btn-success" onclick="false" value="Hand over success">
                                        @endif
                                        
                                        
                                    </form>
                                    
                                </td>
                                

                                <td><a href="{{url('print-pdf', $order->id)}}"  style="background-color: #374adb;" onmouseover="this.style.backgroundColor = '#3776db'" ; onmouseout="this.style.backgroundColor = '#374adb'" ;>Download</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>






    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>