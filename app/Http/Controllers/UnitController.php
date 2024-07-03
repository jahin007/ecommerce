<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function manage_unit(){
        $units = Unit::all();
        return view('backend.unit.manage_unit',compact('units'));
    }

    public function unit_create(){
        return view('backend.unit.unit_create');
    }

    public function unit_store(Request $request){
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
        ]);

        $unit = new Unit();
        $unit->id = $request->unit;
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->save();

        session()->flash('success', 'Unit has created successfully..!!');
        return redirect()->route('admin.units');
    }

    public function unit_status_change($id){
        $unit = Unit::find($id);
        if($unit->status ==1){
            $unit->update(['status'=>0]);
        }else{
            $unit->update(['status'=>1]);
        }
        session()->flash('success', 'Unit status has changed successfully..!!');
        return redirect()->route('admin.units');
    }

    public function unit_edit($id){
        $unit = Unit::find($id);
        return view('backend.unit.unit_edit',compact('unit'));
    }

    public function unit_update(Request $request,$id){
        $unit = Unit::find($id);
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->save();

        session()->flash('success', 'Unit has updated successfully..!!');
        return redirect()->route('admin.units');

    }

    public function unit_delete($id){
        $unit = Unit::find($id);
        if (!is_null($unit)) {
            $unit->delete();
        }
        session()->flash('delete', 'Unit has deleted successfully..!!');
        return back();
    }
}
