@extends('backend.admin.admin_master')
@section('content')
    @include('backend.admin.admin_message')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title></div>
                <div class="box-content">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Date & Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>
                            <tr>
                                <td>{{$order->id}}</td>
                                <td class="center">{{$order->customer->name}}</td>
                                <td class="center">{{$order->total}}</td>
                                <td class="center">{{\Carbon\Carbon::parse($order->created_at)->format('Md,Y,h:iA')}}</td>
                                <td class="center">
                                    <span class="label label-success">Active</span>
                                    <span class="label label-danger">Unactive</span>
                                </td>
                                <td class="center">
                                    <a class="btn btn-danger" href="#">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                    <a class="btn btn-success" href="#">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{route('admin.view_order',$order->id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#" id="delete">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
