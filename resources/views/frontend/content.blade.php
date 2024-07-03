@extends('frontend.master');
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->

            <div class="row">
                <!-- shop -->
                @foreach($categories as $category)
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <a href="{{route('product_by_cat',$category->id)}}">
                        <div class="shop-img">
                            <img src="{{asset('/images/categories/'.$category->image)}}" alt="" height="200">
                        </div>
                        </a>
                        <div class="shop-body">
                            <a href="{{route('product_by_cat',$category->id)}}"><h3>{{$category->name}}<br>Collection</h3></a>
                            <a href="{{route('product_by_cat',$category->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /shop -->
            </div>

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $category)
                                <li><a href="{{route('product_by_cat',$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach($products as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($product->images as $image)
                                            @if($i > 0)
                                            <a href="{{route('view_details',$product->id)}}"><img src="{{asset('/images/products/'.$image->image)}}" alt="" style="width: 263px; height: 263px;"></a>
                                            @endif
                                            @php
                                                $i--;
                                            @endphp
                                            @endforeach
                                            <a href="{{route('view_details',$product->id)}}"><div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><a href="{{route('view_details',$product->id)}}">{{$product->category->name}}</a></p>
                                            <h3 class="product-name"><a href="{{route('view_details',$product->id)}}">{{$product->name}}</a></h3>
                                            <h4 class="product-price">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><a href="{{route('view_details',$product->id)}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <form action="{{route('add_to_cart')}}" method="post">
                                            @csrf
                                            <div class="add-to-cart">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $category)
                                    <li><a href="{{route('product_by_cat',$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach($topProducts as $topProduct)
                                        <div class="product">
                                            <div class="product-img">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($topProduct->images as $image)
                                                    @if($i > 0)
                                                        <a href="{{route('view_details',$topProduct->id)}}"><img src="{{asset('/images/products/'.$image->image)}}" alt="" style="width: 263px; height: 263px;"></a>
                                                    @endif
                                                    @php
                                                        $i--;
                                                    @endphp
                                                @endforeach
                                                <a href="{{route('view_details',$topProduct->id)}}"><div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
                                                <h3 class="product-name"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->name}}</a></h3>
                                                <h4 class="product-price">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><a href="{{route('view_details',$topProduct->id)}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <form action="{{route('add_to_cart')}}" method="post">
                                                @csrf
                                                <div class="add-to-cart">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="id" value="{{$topProduct->id}}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            @foreach($topProducts as $topProduct)
                            <div class="product-widget">
                                <div class="product-img">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($topProduct->images as $image)
                                        @if($i > 0)
                                            <a href="{{route('view_details',$topProduct->id)}}"><img src="{{asset('/images/products/'.$image->image)}}" alt="" style="width: 40px; height: 40px;"></a>
                                        @endif
                                        @php
                                            $i--;
                                        @endphp
                                    @endforeach
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
                                    <h3 class="product-name"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->name}}</a></h3>
                                    <h4 class="product-price">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></h4>
                                </div>
                            </div>
                            @endforeach
                            <!-- /product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            @foreach($topProducts as $topProduct)
                                <div class="product-widget">
                                    <div class="product-img">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($topProduct->images as $image)
                                            @if($i > 0)
                                                <a href="{{route('view_details',$topProduct->id)}}"><img src="{{asset('/images/products/'.$image->image)}}" alt="" style="width: 40px; height: 40px;"></a>
                                            @endif
                                            @php
                                                $i--;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
                                        <h3 class="product-name"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->name}}</a></h3>
                                        <h4 class="product-price">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></h4>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            @foreach($topProducts as $topProduct)
                                <div class="product-widget">
                                    <div class="product-img">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($topProduct->images as $image)
                                            @if($i > 0)
                                                <a href="{{route('view_details',$topProduct->id)}}"><img src="{{asset('/images/products/'.$image->image)}}" alt="" style="width: 40px; height: 40px;"></a>
                                            @endif
                                            @php
                                                $i--;
                                            @endphp
                                        @endforeach
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
                                        <h3 class="product-name"><a href="{{route('view_details',$topProduct->id)}}">{{$topProduct->name}}</a></h3>
                                        <h4 class="product-price">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></h4>
                                    </div>
                                </div>
                            @endforeach
                            <!-- /product widget -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
