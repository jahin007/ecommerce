<?php
use App\Models\Product;
?>

@extends('frontend.master');
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title" style="color: #D10024;">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach($categories as $category)
                                @php
                                    $catProduct_count =App\Models\Product::catProduct_count($category->id);
                                @endphp
                                <div class="input-checkbox">
                                    <label for="category-1">
                                        <span></span>
                                        <li><a href="{{route('product_by_cat',$category->id)}}">{{$category->name}}<small>  ({{$catProduct_count}})</small></a></li>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title" style="color: #D10024;">Brand</h3>
                        <div class="checkbox-filter">
                            @foreach($brands as $brand)
                                @php
                                    $brandProduct_count =App\Models\Product::brandProduct_count($brand->id);
                                @endphp
                                <div class="input-checkbox">
                                    <label for="brand-1">
                                        <span></span>
                                            <li><a href="{{route('product_by_brand',$brand->id)}}">{{$brand->name}}<small>  ({{$brandProduct_count}})</small></a></li>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
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
                        </div>
                        <!-- /product -->
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection

