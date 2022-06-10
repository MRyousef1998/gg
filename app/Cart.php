<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\CartItem;

class Cart extends Model
{
    protected $fillable =[

        'cart_items',
        'total',
        'user_id',
 
    ];
    
      public function user(){
        return $this->belongsToMany(User::class);
    }
       public function order(){
        return $this->belongsToMany(Order::class);
    }
//        public function cartItems(){
//            if(is_null($this->cart_items)){
//            $this->cart_items=[];
//               return $this->cart_items; 
//         } 
//         return json_decode($this->cart_items,true);
//     }
    
    
       public function index(){
        $user=Auth::user();
        $cart=$user->cart;
        $cartItems=json_decode($cart->cart_items);
        $finalCartItems=[];
        foreach($cartItems as $cartItem)
        {
         $product=Product::find(intval ($cartItem->product->id));
         
        $finalCartItem=new \stdClass();
        $finalCartItem->product=new ProductResource($product);
        $finalCartItem->qty=$cartItem->qty;
       
        array_push($finalCartItems,$finalCartItem);
        
        }
           return [
           'cart_items'=>$finalCartItems ,   
            'id'=> $cart->id,
              'total'=> $cart-> total,
           ];
            
    }
    
     public function addProductToCart(Product $product,$qty=1){
      
         $cartItems=$this->cart_items;
         
           if(is_null($cartItems)){
           $cartItems=[];
              
        } 
         else{
               if(! is_array($cartItems))
           $cartItems=json_decode($cartItems);
           }
         $cartItem=new CartItem($product,$qty); 
        // dd( $product);
         array_push($cartItems,$cartItem);
        
         $this->cart_items=json_encode($cartItems);
          $tempTotal=0;
        foreach($cartItems as $cartItem){
         $tempTotal+=($cartItem->qty * $cartItem->product->price); }
        $this->total=$tempTotal;
         return $cartItems;
        
    }
    
    public function incrmentProductinCart(Product $product,$qty=1){
          $cartItems=$this->cart_items;
           if(is_null($cartItems)){
           $cartItems=[];
              
        } else{
               if(! is_array($cartItems))
           $cartItems=json_decode($this->cart_items);
           }
        
          foreach($cartItems as $cartItem){
          if($product->id==$cartItem->product->id){
              $cartItem->qty=$cartItem->qty+$qty;
          
          }
           } 
        $this->cart_items=json_encode($cartItems );
        $tempTotal=0;
        foreach($cartItems as $cartItem){
         $tempTotal+=($cartItem->qty * $cartItem->product->price); }
        $this->total=$tempTotal;
    
   
    }
   
      public function inItem($productId){
           $cartItems=$this->cart_items;
         //  return $cartItems;
           if(is_null($cartItems)){
           $cartItems=[];
              
        } else{
               if(! is_array($cartItems))
           $cartItems=json_decode($this->cart_items);
           }
         
        
          foreach($cartItems as $cartItem){
          if($productId==$cartItem->product->id){
              return true;
          
          }
          }
          return false;
      }
}
