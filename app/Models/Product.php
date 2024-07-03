<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['id','cat_id','subcat_id','brand_id','unit_id','size_id','color_id','code','name','description','price','image','status'];

    protected function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    protected function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcat_id');
    }

    protected function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

    protected function unit(){
        return $this->belongsTo(Unit::class,'unit_id');
    }

    protected function size(){
        return $this->belongsTo(Size::class,'size_id');
    }

    protected function color(){
        return $this->belongsTo(Color::class,'color_id');
    }

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public static function catProduct_count($cat_id){
        $catProduct_count = Product::where('cat_id',$cat_id)->where('status',1)->count();
        return $catProduct_count;
    }

    public static function subProduct_count($subcat_id){
        $subProduct_count = Product::where('subcat_id',$subcat_id)->where('status',1)->count();
        return $subProduct_count;
    }

    public static function brandProduct_count($brand_id){
        $brandProduct_count = Product::where('brand_id',$brand_id)->where('status',1)->count();
        return $brandProduct_count;
    }
}
