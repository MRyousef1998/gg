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
    
    
       public function index(){
        $user=Auth::user();
        $cart=$user->cart;
            
            if(is_null($cart)){
           
            return [
           'cart_items'=>[],   
           ];
            
            }
        $cartItems=json_decode($cart->cart_items);
        $finalCartItems=[];
        foreach($cartItems as $cartItem)
        {
         $product=Product::find(intval ($cartItem->product->id));
         
        $finalCartItem=new \stdClass();
        $finalCartItem->product=new ProductResource($product);
        $finalCartItem->qty=number_format(doubleval($cartItem->qty),2);
       
        array_push($finalCartItems,$finalCartItem);
        
        }
           return [
           'cart_items'=>$finalCartItems ,   
            'id'=>number_format(doubleval( $cart->id),2),
              'total'=>number_format(doubleval($cart-> total),2) ,
           ];
            
    }
    
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
            //$user->cart_id=$cart->id;
            
            
            }
           //return ['l'=> $cart->inItem($product_id)];
            if($cart->inItem($product_id)){
                
             $cart->incrmentProductinCart($product,$qty);
            } 
            else{
               
            
               $cart->addProductToCart($product,$qty);
           
            }
             
          
         
               $cart->save();
            $user->cart_id=$cart->id;
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
