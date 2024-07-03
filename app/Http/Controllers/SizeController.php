<?php

namespace App\Http\Controllers;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function manage_size(){
        $sizes = Size::all();
        return view('backend.size.manage_size',compact('sizes'));
    }

    public function size_create(){
        return view('backend.size.size_create');
    }

    public function size_store(Request $request){

        $sizes=explode(',',$request->size);
        $size = new Size();
        $size->size = json_encode($sizes);
        $size->save();

        session()->flash('success', 'Size has created successfully..!!');
        return redirect()->route('admin.sizes');
    }

    public function size_status_change($id){
        $size = Size::find($id);
        if($size->status ==1){
            $size->update(['status'=>0]);
        }else{
            $size->update(['status'=>1]);
        }
        session()->flash('success', 'Size status has changed successfully..!!');
        return redirect()->route('admin.sizes');
    }

    public function size_edit($id){
        $size = Size::find($id);
        return view('backend.size.size_edit',compact('size'));
    }

    public function size_update(Request $request,$id){
        $sizes=explode(',',$request->size);
        $size = Size::find($id);
        $size->size = json_encode($sizes);
        $size->save();

        session()->flash('success', 'Size has updated successfully..!!');
        return redirect()->route('admin.sizes');

    }

    public function size_delete($id){
        $size = Size::find($id);
        if (!is_null($size)) {
            $size->delete();
        }
        session()->flash('delete', 'Size has deleted successfully..!!');
        return back();
    }
}
