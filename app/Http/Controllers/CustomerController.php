<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function customer_login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $result = Customer::where('email',$email)->where('password',$password)->first();
        if($result){
            Session::put('c_id',$result->id);
            Session::put('name',$result->name);
            return redirect()->route('checkout');
        }else{
            session()->flash('error','Email or password invalid..!!');
            return redirect()->route('login_check');
        }
    }

    public function customer_reg(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['mobile'] = $request->mobile;
        $c_id = Customer::insertGetId($data);
        Session::put('c_id',$c_id);
        Session::put('name',$request->name);

        return redirect()->route('checkout');
    }

    public function customer_logout(){
        Session::flush();
        return redirect()->route('index');
    }
}
