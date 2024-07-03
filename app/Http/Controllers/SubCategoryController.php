<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_subcategory(){
        $subcategories = SubCategory::all();
        return view('backend.subcategory.manage_subcategory',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subcategory_create(){
        $categories = Category::all();
        return view('backend.subcategory.subcategory_create',compact('categories'));
    }


    public function subcategory_store(Request $request){
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
        ]);

        $subcategory = new SubCategory();
        $subcategory->id = $request->subcategory;
        $subcategory->cat_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->save();

        session()->flash('success', 'SubCategory has created successfully..!!');
        return redirect()->route('admin.subcategories');
    }


    public function subcat_status_change($id){
        $subcategory = SubCategory::find($id);
        if($subcategory->status ==1){
            $subcategory->update(['status'=>0]);
            session()->flash('success', 'SubCategory status has changed successfully..!!');
        }else{
            $category = Category::find($subcategory->cat_id);
            if($category->status == 1){
                $subcategory->update(['status'=>1]);
                session()->flash('success', 'SubCategory status has changed successfully..!!');
            }
            else{
                session()->flash('error', 'Category is not active..!!');
            }
        }
        return redirect()->route('admin.subcategories');
    }



    public function subcategory_edit($id){
        $categories = Category::all();
        $subcategory = SubCategory::find($id);
        return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));
    }

    public function subcategory_update(Request $request,$id){
        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->category;
        $subcategory->description = $request->description;
        $subcategory->save();

        session()->flash('success', 'SubCategory has updated successfully..!!');
        return redirect()->route('admin.subcategories');

    }

    public function subcategory_delete($id){
        $subcategory = SubCategory::find($id);
        if (!is_null($subcategory)) {
            $subcategory->delete();
        }
        session()->flash('delete', 'SubCategory has deleted successfully..!!');
        return back();
    }
}
