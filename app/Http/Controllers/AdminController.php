<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function index(){
        return view('backend.admin.admin_login');
    }

    public function dashboard(){
        $this->admin_check();
        return view('backend.admin.admin_content');
    }


    public function show_dashboard(Request $request){

        $admin_email = $request->email;
        $admin_password = md5($request->password);
        $result = Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return redirect()->route('admin.dashboard');
        }else{
            session()->flash('error','Email or password invalid..!!');
            return redirect()->route('admin.login');
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('admin.login');
    }

    public function admin_check(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return redirect()->route('admin.login')->send();
        }
    }

}
