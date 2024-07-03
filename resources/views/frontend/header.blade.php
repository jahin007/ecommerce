<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar">&#2547;</i> BDT</a></li>
                @if(Session::get('name') !=null)
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" style="background-color: #D10024 !important;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Session::get('name')}}
                                <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" style="min-width: 0px; padding: 0px 0px; margin: 1px 0 " aria-labelledby="dropdownMenuButton">
                                <button class="btn btn-danger" style="background-color: #D10024 !important; padding: 0px 20px; "><a class="dropdown-item" href="{{route('customer_logout')}}"> Logout</a></button>
                            </div>
                        </div>
                    </li>
                @else
                    <li><a href="{{route('login_check')}}"><i class="fa fa-user-o"></i> Login</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('index')}}" class="logo">
                            <img src="{{asset('/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('search')}}" method="get">
                            <input class="input" name="search" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        @php
                        $cart_details = Cart::getContent();
                        @endphp
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{count($cart_details)}}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach($cart_details as $cart_detail)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('/img/product09.png')}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$cart_detail->name}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$cart_detail->quantity}}x</span>&#2547;{{$cart_detail->price}}</h4>
                                        </div>
                                        <a class="delete" href="{{route('cart_delete',$cart_detail->id)}}"><i class="fa fa-close"></i></a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="cart-summary">
                                    <small>{{count($cart_details)}} Item(s) selected</small>
                                    <h5>SUBTOTAL: &#2547;{{Cart::getTotal()}}</h5>
                                </div>
                                <div class="cart-btns">
                                    (@if(Session::get('name') !=null)
                                    <a href="{{route('checkout')}}" style="width: 100%; background-color: #D10024;">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                    @else
                                        <a href="{{route('login_check')}}" style="width: 100%; background-color: #D10024;">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
