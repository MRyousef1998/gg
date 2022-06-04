<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

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
     public function addProductToCart(Product $product,$qty=1){
          return response()->json([
        'posts' => $product
    ])
         $cartItems=$this->cart_items;
         
           if(is_null($cartItems)){
           $cartItems=[];
              
        } 
         else{
               if(! is_array($cartItems))
           $cartItems=json_decode($this->cart_items,true);
           }
         $cartItem=new CartItem($product,$qty); 
        // dd( $product);
         array_push($cartItems,$cartItem);
        
         $this->cart_items=json_encode($cartItems);
         return $cartItems;
        
    }
    
    public function incrmentProductinCart(Product $product,$qty=1){
          $cartItems=$this->cart_items;
           if(is_null($cartItems)){
           $cartItems=[];
              
        } else{
               if(! is_array($cartItems))
           $cartItems=json_decode($this->cart_items,true);
           }
        
          foreach($cartItems as $cartItem){
          if($productId==$cartItem->product->id){
              $cartItem->qty+=$qty;
          
          }
              
    }}
   
      public function inItem($productId){
           $cartItems=$this->cart_items;
           if(is_null($cartItems)){
           $cartItems=[];
              
        } else{
               if(! is_array($cartItems))
           $cartItems=json_decode($this->cart_items,true);
           }
        
          foreach($cartItems as $cartItem){
          if($productId==$cartItem->product->id){
              return true;
          
          }
          }
          return false;
      }
}
