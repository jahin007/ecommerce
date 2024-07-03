<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function manage_color(){
        $colors = Color::all();
        return view('backend.color.manage_color',compact('colors'));
    }

    public function color_create(){
        return view('backend.color.color_create');
    }

    public function color_store(Request $request){

        $colors=explode(',',$request->color);
        $color = new Color();
        $color->color = json_encode($colors);
        $color->save();

        session()->flash('success', 'Color has created successfully..!!');
        return redirect()->route('admin.colors');
    }

    public function color_status_change($id){
        $color = Color::find($id);
        if($color->status ==1){
            $color->update(['status'=>0]);
        }else{
            $color->update(['status'=>1]);
        }
        session()->flash('success', 'Color status has changed successfully..!!');
        return redirect()->route('admin.colors');
    }

    public function color_edit($id){
        $color = Color::find($id);
        return view('backend.color.color_edit',compact('color'));
    }

    public function color_update(Request $request,$id){
        $colors=explode(',',$request->color);
        $color = Color::find($id);
        $color->color = json_encode($colors);
        $color->save();

        session()->flash('success', 'Color has updated successfully..!!');
        return redirect()->route('admin.colors');

    }

    public function color_delete($id){
        $color = Color::find($id);
        if (!is_null($color)) {
            $color->delete();
        }
        session()->flash('delete', 'Color has deleted successfully..!!');
        return back();
    }
}
