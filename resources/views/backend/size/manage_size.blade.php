@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Sizes</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 10%">ID</th>
                        <th style="width: 30%">Size</th>
                        <th style="width: 20%">Status</th>
                        <th style="width: 40%">Actions</th>
                    </tr>
                    </thead>
                    @foreach($sizes as $size)
                    <tbody>
                    <tr>
                        <td>{{$size->id}}</td>
                        <td>
                            @foreach(json_decode($size->size) as $sizes)
                                <ul class="span3">
                                    {{$sizes}}
                                </ul>
                            @endforeach
                        </td>
                        <td class="center">
                            @if($size->status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Deactive</span>
                            @endif
                        </td>
                        <td class="center">
                                @if($size->status == 1)
                                <a class="btn btn-danger" href="{{route('admin.size.status',$size->id)}}">
                                    <i class="halflings-icon white thumbs_down"></i>
                                </a>
                                @else
                                    <a class="btn btn-success" href="{{route('admin.size.status',$size->id)}}">
                                        <i class="halflings-icon white thumbs_up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{route('admin.size.edit',$size->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('admin.size.delete',$size->id)}}">
                                    <i class="halflings-icon white trash"></i>
                                </a>
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
