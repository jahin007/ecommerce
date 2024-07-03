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

class ShippingController extends Controller
{
    public function save_shipping(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['zip_code'] = $request->zip_code;
        $data['mobile'] = $request->mobile;
        $s_id = Shipping::insertGetId($data);
        Session::put('s_id',$s_id);

        return redirect()->route('payment');
    }

    public function payment(){
        $cart_collection = Cart::getContent();
        return view('frontend.pages.payment',compact('cart_collection'));
    }

    public function order_place(Request $request){

        $payment_method = $request->payment;
        $pdata = array();
        $pdata['payment_method'] = $payment_method;
        $pdata['status'] = 'pending';
        $pay_id = Payment::insertGetId($pdata);
        Session::put('p_id',$pay_id);

        $odata = array();
        $odata['cus_id'] = Session::get('c_id');
        $odata['ship_id'] = Session::get('s_id');
        $odata['pay_id'] = $pay_id;
        $odata['total'] = Cart::getTotal();
        $odata['status'] = 'pending';
        $order_id = Order::insertGetId($odata);
        Session::put('o_id',$order_id);


        $cartCollection = Cart::getContent();
        $oddata = array();
        foreach ($cartCollection as $cartContent){
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $cartContent->id;
            $oddata['product_name'] = $cartContent->name;
            $oddata['product_price'] = $cartContent->price;
            $oddata['product_sales_quantity'] = $cartContent->quantity;
            DB::table('order_details')->insert($oddata);
        }

        if($payment_method == 'cash'){
            Cart::clear();
            return view('frontend.pages.payment_success');
        }elseif ($payment_method == 'bkash'){
            Cart::clear();
            return view('frontend.pages.payment_success');
        }elseif ($payment_method == 'nagad'){
            Cart::clear();
            return view('frontend.pages.payment_success');
        }
    }
}
