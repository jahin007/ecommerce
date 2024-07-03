<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function manage_brand(){
        $brands = Brand::all();
        return view('backend.brand.manage_brand',compact('brands'));
    }

    public function brand_create(){
        return view('backend.brand.brand_create');
    }

    public function brand_store(Request $request){
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
        ]);

        $brand = new Brand();
        $brand->id = $request->brand;
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        session()->flash('success', 'Brand has created successfully..!!');
        return redirect()->route('admin.brands');
    }

    public function brand_status_change($id){
        $brand = Brand::find($id);
        if($brand->status ==1){
            $brand->update(['status'=>0]);
        }else{
            $brand->update(['status'=>1]);
        }
        session()->flash('success', 'Brand status has changed successfully..!!');
        return redirect()->route('admin.brands');
    }

    public function brand_edit($id){
        $brand = Brand::find($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }

    public function brand_update(Request $request,$id){
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        session()->flash('success', 'Brand has updated successfully..!!');
        return redirect()->route('admin.brands');

    }

    public function brand_delete($id){
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            $brand->delete();
        }
        session()->flash('delete', 'Brand has deleted successfully..!!');
        return back();
    }
}
