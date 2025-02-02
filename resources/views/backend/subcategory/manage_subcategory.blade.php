@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All SubCategories</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 05%">Sub Cat ID</th>
                        <th style="width: 15%">SubCategory Name</th>
                        <th style="width: 15%">Category Name</th>
                        <th style="width: 30%">Description</th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 20%">Actions</th>
                    </tr>
                    </thead>
                    @foreach($subcategories as $subcategory)
                    <tbody>
                    <tr>
                        <td>{{$subcategory->id}}</td>
                        <td class="center">{{$subcategory->name}}</td>
                        <td class="center">{{$subcategory->category->name}}</td>
                        <td class="center">{!!$subcategory->description!!}</td>
                        <td class="center">
                            @if($subcategory->status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Deactive</span>
                            @endif
                        </td>
                        <td class="center">
                            <div class="span3"></div>
                            <div class="span2">
                                @if($subcategory->status == 1)
                                <a class="btn btn-danger" href="{{route('admin.subcategory.status',$subcategory->id)}}">
                                    <i class="halflings-icon white thumbs_down"></i>
                                </a>
                                @else
                                    <a class="btn btn-success" href="{{route('admin.subcategory.status',$subcategory->id)}}">
                                        <i class="halflings-icon white thumbs_up"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="span2">
                                <a class="btn btn-info" href="{{route('admin.subcategory.edit',$subcategory->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                            </div>
                            <div class="span2">
                                <a class="btn btn-danger" href="{{route('admin.subcategory.delete',$subcategory->id)}}">
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
