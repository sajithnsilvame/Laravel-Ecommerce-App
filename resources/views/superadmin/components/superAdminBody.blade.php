<div class="main-panel">
    <div class="content-wrapper">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-4 col-sm-3 col-xl-2">
                                    <img src="/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                                </div>

                                <div class="col-5 col-sm-7 col-xl-8 p-0">
                                    <h4 class="mb-1 mb-sm-0 ml-52" style="font-size: 24px;">S R I Y A N I &nbsp&nbsp&nbsp T E X T I L E</h4>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$products}}</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-shopping"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Products</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$orders}}</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success">
                                        <span class="mdi mdi-cart"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Orders</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{$customers}}</h3>
                                        {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-danger">
                                        <span class="mdi mdi-account-multiple"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Customers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">Rs {{$total_revenue}}</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-success ">
                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Total Revenue</h6>
                        </div>
                    </div>
                </div>
            </div>


            <!--  -->


            <div class="row">
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5>Delivered Orders</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">{{$delivered_orders}}</h2>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                    </div>
                                    {{-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> --}}
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    {{-- <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5>processing Orders</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">{{$processing_orders}}</h2>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p> --}}
                                    </div>
                                    {{-- <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6> --}}
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    {{-- <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h5>Number of Deliver Boys</h5>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h2 class="mb-0">{{$deliver_boys}}</h2>
                                        {{-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p> --}}
                                    </div>
                                    {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    {{-- <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->    
        </div>
    </div>
</div>