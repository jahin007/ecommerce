<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use DB;
use Cart;
use Session;

class CheckoutController extends Controller
{
    public function checkout(){
        $customer_id = Customer::where('id',Session::get('c_id'))->first();
        return view('frontend.pages.checkout',compact('customer_id'));
    }

    public function login_check(){
        return view('frontend.pages.login_check');
    }

}
