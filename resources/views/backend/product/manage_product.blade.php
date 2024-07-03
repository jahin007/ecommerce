@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 05%">Product Code</th>
                        <th style="width: 10%">Product Name</th>
                        <th style="width: 20%">Description</th>
                        <th style="width: 05%">Price</th>
                        <th style="width: 20%">Image</th>
                        <th style="width: 05%">Cat Name</th>
                        <th style="width: 05%">SubCat Name</th>
                        <th style="width: 05%">Brand</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 15%">Actions</th>
                    </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                    <tr>
                        <td>{{$product->code}}</td>
                        <td class="center">{{$product->name}}</td>
                        <td class="center">{!!$product->description!!}</td>
                        <td class="center">&#2547;{{$product->price}}</td>
                        <td>
                            @foreach($product->images as $image)
                                <img src="{{asset('/images/products/'.$image->image)}}" alt="" style="height: 50px; width: 50px;">
                            @endforeach
                        </td>
                        <td class="center">{{$product->category->name}}</td>
                        <td class="center">{{$product->subcategory->name}}</td>
                        <td class="center">{{$product->brand->name}}</td>
                        <td class="center">
                            @if($product->status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Deactive</span>
                            @endif
                        </td>
                        <td class="center">
                            <div class="span3"></div>
                            <div class="span2">
                                @if($product->status == 1)
                                <a class="btn btn-danger" href="{{route('admin.product.status',$product->id)}}">
                                    <i class="halflings-icon white thumbs_down"></i>
                                </a>
                                @else
                                    <a class="btn btn-success" href="{{route('admin.product.status',$product->id)}}">
                                        <i class="halflings-icon white thumbs_up"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="span2">
                                <a class="btn btn-info" href="{{route('admin.product.edit',$product->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>
                            <div class="span2">
                                <a class="btn btn-danger" href="{{route('admin.product.delete',$product->id)}}">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </div>
                            <div class="span3"></div>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
