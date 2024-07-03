<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    public function manage_product(){
        $products = Product::all();
//        foreach ($products as $product) {
//            $product_images = ProductImage::where('product_id', $product->id)->get();
//            $product->images = $product_images;
//        }
        return view('backend.product.manage_product',compact('products'));
    }

    public function product_create(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('backend.product.product_create',compact('categories','subcategories','brands','units','sizes','colors'));
    }

    public function product_store(Request $request){
        $request->validate([
            'name' => 'required|max:150',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id = $request->color;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        if ($request->hasFile('product_image')) {
            $images = $request->file('product_image');
            $i = 0;
            foreach ($images as $image) {
                $img = time() . ++$i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/');
                $image->move($location, $img);

                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }


        session()->flash('success','Product has created successfully..!!');
        return redirect()->route('admin.products');
    }

    public function product_status_change($id){
        $product = Product::find($id);
        if($product->status ==1){
            $product->update(['status'=>0]);
        }else{
            $product->update(['status'=>1]);
        }
        session()->flash('success', 'Product status has changed successfully..!!');
        return redirect()->route('admin.products');
    }

    public function product_edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('backend.product.product_edit',compact('product','categories','subcategories','brands','units','sizes','colors'));
    }

    public function product_update(Request $request,$id){

        $product = Product::find($id);
        $sizes=explode(',',$request->size);
        $colors=explode(',',$request->color);
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = (int)json_encode($sizes);
        $product->color_id = (int)json_encode($colors);
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();


        $product_images = ProductImage::where('product_id',$product->id)->get();
        foreach ($product_images as $image){
            if(File::exists('images/products/'.$image->image)){
                File::delete('images/products/'.$image->image);
            }
            $image->delete();
        }

        if ($request->hasFile('product_image')) {
            $images = $request->file('product_image');
            $i = 0;
            foreach ($images as $image) {
                $img = time() . ++$i . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/');
                $image->move($location, $img);

                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }

        session()->flash('update','Product has updated successfully..!!');
        return redirect()->route('admin.products');
    }

    public function product_delete($id){
        $product = Product::find($id);
        $product_images = ProductImage::where('product_id',$product->id)->get();
        foreach ($product_images as $image){
            if(File::exists('images/products/'.$image->image)){
                File::delete('images/products/'.$image->image);
            }
            $image->delete();
        }
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('delete','Product has deleted successfully..!!');
        return back();
    }
}
