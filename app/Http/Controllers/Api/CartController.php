<?php

namespace App\Http\Controllers\Api;
use  App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Illuminate\Http\Request;
use  App\Cart;

class CartController extends Controller
{
    
        public function AddProductToCart(Request $request){
            
            $request->validate([
               'product_id'=>'required',
                'qty'=>'required'
            ]);
            $user=Auth::user();
            
            $product_id=$request->input('product_id');
            
            $product=Product::findOrFail($product_id);
            
            $cart=$user->cart;
            $qty=$request->input('qty');
            
            if(is_null($cart)){
            $cart=new Cart();
            $cart->cart_items=[];
            $cart->total=0;
            $cart->user_id=$user->id;
            $user->cart_id=$cart->id;
            
            
            }
            if($cart->inItem($product_id)){
             $cart->incrmentProductinCart($product);
            } 
            else{
            
               $cart->addProductToCart($product,$qty);
             return $cart;
            }
             $user->cart_id=$cart->id;
            
               $cart->save();
             $user->save();
             return   $cart;
            return new CartResource($cart);

        }
    private function cartState(Cart $cart=null){
        if(is_null($cart)){
            $cart=new Cart();
            $cart->cart_item=[];
            $cart->total=0;
           
            return $cart;
        }
        return $cart;
    
    
    }
       


}
