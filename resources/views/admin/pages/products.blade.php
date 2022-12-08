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

        .modal-content {
            background-color: white;
        }

        .modal-title {
            color: black;
        }

        .modal-body {
            color: black;
        }

        button#ok {
            background-color: #f52d05;
            padding-left: 15px;
            padding-right: 15px;
            color: #fff;
            font-weight: 500;
        }

        button#cancel {
            background-color: #4b41d9;
            color: #fff;
            font-weight: 500;
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

                    <!-- Modal ------------------------------------------------------>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete product?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to delete this product?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Cancel</button>
                                    <button type="button" class="btn btn-primary ml-2" id="ok" onclick="deletefun()">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -------------------------------------------------->

                    <div class="div_center">
                        <h2 class="h2_font">Products List</h2>
                        
                    </div>

                    <div class="mt-6">
                        <table class="table">

                            <tr class="font-color">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                            @foreach($listItem as $listItem)
                            <tr class="font-color">
                                <td>{{$listItem->id}}</td>
                                <td>{{$listItem->title}}</td>
                                <td>{{$listItem->description}}</td>
                                <td>{{$listItem->category}}</td>
                                <td>{{$listItem->quantity}}</td>
                                <td>{{$listItem->price}}</td>
                                <td>{{$listItem->discount_price}}</td>
                                <td>
                                    <a href="/product_img/{{$listItem->image}}"> <img class="img_size" src="/product_img/{{$listItem->image}}"> </a>
                                </td>
                                <td><a onclick=" return confirm('Are you sure that delete this product?')" href="{{url('delete-product', $listItem->id)}}" class="btn btn-danger"><i class="mdi mdi-trash-can-outline"></i></a></td>
                                <td><a href="{{url('edit-product', $listItem->id)}}" class="btn btn-success"><i class="mdi mdi-square-edit-outline"></i></a></td>
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