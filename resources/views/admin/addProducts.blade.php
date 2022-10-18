<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sriyani Text</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

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

        label {
            display: inline-block;
            width: 200px;
        }
        .btn{
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
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
                        <h2 class="h2_font">Add Products</h2>
                        <div class="border pt-4 pb-4">
                            <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label>Product Title</label>
                                    <input class="input_color ml-2" type="text" name="title" required="">
                                </div>

                                <div class="mt-2">
                                    <label>Product Description</label>
                                    <input class="input_color ml-2" type="text" name="description" required="">
                                </div>

                                <div class="mt-2">
                                    <label>Product Price</label>
                                    <input class="input_color ml-2" type="number" name="price"  required="">
                                </div>

                                <div class="mt-2">
                                    <label>Discount Price</label>
                                    <input class="input_color ml-2" type="number" name="discount_price">
                                </div>

                                <div class="mt-2">
                                    <label>Product Quantity</label>
                                    <input class="input_color ml-2" type="number" min="1" name="quantity"  required="">
                                </div>

                                <div class="mt-2">
                                    <label>Product Category</label>
                                    <select class="input_color ml-2" name="category" required="">
                                        <option value="" selected="">Select a product category</option>

                                        @foreach($category as $category)

                                        <option value="{{$category->category_name}}"> {{$category->category_name}} </option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-2">
                                    <label>Product Image</label>
                                    <input class="input_color ml-2" type="file" name="image" required="">
                                </div>

                                <div class="mt-2 ml-60">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Product">
                                </div>

                            </form>
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