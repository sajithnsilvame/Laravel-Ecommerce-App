<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    
    
        {{-- <div class="row">
            <div class="col">
                <div class="">
                    <img src="images/image2.jpg" alt="" style="width: 100rem;">       
                </div>
            </div>
        </div> --}}
      
            
        {{-- <section>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="">
                    <img src="images/image2.jpg" alt="" style="width: 100rem;">       
                    </div>
                </div> 
                <div class="carousel-item ">
                    <div class="">
                    <img src="images/slider2.jpg" alt="" style="width: 100rem;">
                    </div>
                </div> 
                <div class="carousel-item ">
                    <div class="">
                    <img src="images/image4.jpg" alt="" style="width: 100rem;">
                    </div>
                </div>     
            </div>          
         </div>   
        </section> --}}

        <section>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/images/image2.jpg" class="d-block w-100 height-50">
                        </div>
                        <div class="carousel-item">
                        <img src="/images/slider2.jpg" class="d-block w-100 height-50">
                        </div>
                        <div class="carousel-item">
                        <img src="/images/image4.jpg" class="d-block w-100 height-50">
                        </div>
                        <div class="carousel-item">
                        <img src="/images/image5.jpg" class="d-block w-100 height-50">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
        </section>
    

    <section class="slider_section ">
            <div class="slider_bg_box">
                <img src="/images/slider-bg.jpg" alt="">
            </div>
            
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    {{-- <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol> --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box ml-36">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="{{url('products')}}" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box ml-36">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="{{url('products')}}" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box ml-36">
                                    <h1>
                                        <span>
                                            Sale 20% Off
                                        </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="{{url('products')}}" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    
</body>

</html>