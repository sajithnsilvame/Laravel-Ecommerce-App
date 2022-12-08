<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/')}}" style="font-size: 35px; color:dodgerblue; font-family: bradley hand,cursive;">SriyaniTextile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('products')}}">Products</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">Blog</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li> --}}
                @if(Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('my-orders')}}">My Orders</a>
                    </li>
                    @endauth
                @endif    

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('products-in-cart')}}"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 25px;"></i></a>
                    </li>

                    <!-- <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form> -->

                    @if (Route::has('login'))
                    @auth
                    <x-app-layout>

                    </x-app-layout>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{route('login')}}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-success ml-3" href="{{route('register')}}">Register</a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>