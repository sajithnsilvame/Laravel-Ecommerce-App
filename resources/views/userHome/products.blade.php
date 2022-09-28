<section class="product_section layout_padding ">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">

            @foreach($productList as $productLists)
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
                            <img src="product_img/{{$productLists->image}}">
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
                                <div class="col-md-4 mt-1">
                                    <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                                </div>
                                <div class="ml-4">
                                    <input type="submit" value="Add to cart" class="option2">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

            <span style="padding-top: 20px; ">

                <!-- paginate start -->
                {!!$productList->withQueryString()->links('pagination::bootstrap-5')!!}
                <!-- paginate end -->

            </span>
        </div>
</section>