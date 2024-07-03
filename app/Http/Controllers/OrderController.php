<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order(){
        $orders = Order::all();
        return view('backend.order.manage_order',compact('orders'));
    }

    public function view_order($id){
        $order = Order::where('id',$id)->first();
        $view_orders = OrderDetail::where('order_id',$id)->get();
        return view('backend.order.view_order',compact('order','view_orders'));
    }
}
