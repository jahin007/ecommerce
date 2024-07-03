<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function add_to_cart(Request $request){
       $quantity = $request->quantity;
       $id = $request->id;

       $product = Product::where('id',$id)->with('images')->first();
       $data['quantity'] = $quantity;
       $data['id'] = $product->id;
       $data['name'] = $product->name;
       $data['price'] = $product->price;
       $data['attributes'] = [$product->images];

       Cart::add($data);
       Cart::getContent();
       return redirect()->back();
   }

   public function cart_delete($id){
        Cart::remove($id);
       return redirect()->back();
   }
}
