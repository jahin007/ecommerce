@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Colors</h2>
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
                        <th style="width: 30%">Color</th>
                        <th style="width: 20%">Status</th>
                        <th style="width: 40%">Actions</th>
                    </tr>
                    </thead>
                    @foreach($colors as $color)
                    <tbody>
                    <tr>
                        <td>{{$color->id}}</td>
                        <td>
                            @foreach(json_decode($color->color) as $colors)
                                <ul class="span3">
                                    {{$colors}}
                                </ul>
                            @endforeach
                        </td>
                        <td class="center">
                            @if($color->status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Deactive</span>
                            @endif
                        </td>
                        <td class="center">
                                @if($color->status == 1)
                                <a class="btn btn-danger" href="{{route('admin.color.status',$color->id)}}">
                                    <i class="halflings-icon white thumbs_down"></i>
                                </a>
                                @else
                                    <a class="btn btn-success" href="{{route('admin.color.status',$color->id)}}">
                                        <i class="halflings-icon white thumbs_up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{route('admin.color.edit',$color->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('admin.color.delete',$color->id)}}">
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
