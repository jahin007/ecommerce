<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="{{route('admin.dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.category.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>
                    <li><a class="submenu" href="{{route('admin.categories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Categories</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> SubCategory</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.subcategory.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add SubCategory</span></a></li>
                    <li><a class="submenu" href="{{route('admin.subcategories')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All SubCategories</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Brand</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.brand.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Brand</span></a></li>
                    <li><a class="submenu" href="{{route('admin.brands')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Brand</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Unit</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.unit.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Unit</span></a></li>
                    <li><a class="submenu" href="{{route('admin.units')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Unit</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Size</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.size.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Size</span></a></li>
                    <li><a class="submenu" href="{{route('admin.sizes')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Size</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Color</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.color.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Color</span></a></li>
                    <li><a class="submenu" href="{{route('admin.colors')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Color</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Product</span></a>
                <ul>
                    <li><a class="submenu" href="{{route('admin.product.create')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Product</span></a></li>
                    <li><a class="submenu" href="{{route('admin.products')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Product</span></a></li>
                </ul>
            </li>
            <li><a href="{{route('admin.orders')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Order</span></a></li>
        </ul>
    </div>
</div>
