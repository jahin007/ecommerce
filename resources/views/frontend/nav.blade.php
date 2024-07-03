<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="{{ Request::path() ==  '/' ? 'active' : ''  }}"><a href="{{route('index')}}">Home</a></li>
                @foreach($categories as $category)
                    @php
                    $path = 'product_by_cat/'.$category->id;
                    @endphp
                <li class="{{ Request::path() ==  $path ? 'active' : ''  }}"><a href="{{route('product_by_cat',$category->id)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
