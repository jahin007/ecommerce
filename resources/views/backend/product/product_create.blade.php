@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Code</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="code" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="name" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Category</label>
                            <div class="controls">
                                <select name="category">
                                    <option value="" disabled selected>Open this category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select SubCategory</label>
                            <div class="controls">
                                <select name="subcategory">
                                    <option value="" disabled selected>Open this subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Brand</label>
                            <div class="controls">
                                <select name="brand">
                                    <option value="" disabled selected>Open this brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Unit</label>
                            <div class="controls">
                                <select name="unit">
                                    <option value="" disabled selected>Open this unit</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Size</label>
                            <div class="controls">
                                <select name="size">
                                    <option value="" disabled selected>Open this size</option>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Color</label>
                            <div class="controls">
                                <select name="color">
                                    <option value="" disabled selected>Open this color</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->color}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="price" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">File Upload</label>
                            <div class="controls">
                                <input type="file" name="product_image[]" class="form-control" id="product_image" multiple>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
