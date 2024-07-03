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
use DB;
class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $units = Unit::where('status',1)->get();
        $sizes = Size::where('status',1)->get();
        $colors = Color::where('status',1)->get();
        $products = Product::where('status',1)->with('images')->latest()->limit(12)->get();
//        foreach ($products as $product) {
//            $product_images = ProductImage::where('product_id', $product->id)->get();
//            $product->images = $product_images;
//        }

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s) {
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.content',compact('products','categories','subcategories','brands','units','sizes','colors','topProducts'));
    }


    public function view_details($id){
        $categories = Category::where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $units = Unit::where('status',1)->get();
        $product = Product::find($id);
        $sizes = Size::find($product->size_id);
        $colors = Color::find($product->color_id);
        $cat_id = $product->cat_id;
        $related_products = Product::where('cat_id',$cat_id)->limit(4)->get();
        return view('frontend.pages.view_details',compact('product','categories','subcategories','brands','units','sizes','colors','cat_id','related_products'));
    }


    public function product_by_cat($id){
        $categories = Category::where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $products = Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
    }

    public function product_by_subcat($id){
        $categories = Category::where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $products = Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_subcat',compact('categories','subcategories','brands','products'));
    }

    public function product_by_brand($id){
        $categories = Category::where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $products = Product::where('status',1)->where('brand_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_brand',compact('categories','subcategories','brands','products'));
    }

    public function search(Request $request){
        $search = $request->search;
        $products = Product::orWhere('name','like','%'.$search.'%')->orderBy('id','desc')->get();
        return view('frontend.pages.product_by_cat',compact('products','search'));
    }
}
