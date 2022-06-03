<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable =[

        'cart_items',
        'total',

    ];
    
      public function user(){
        return $this->belongsToMany(User::class);
    }
       public function order(){
        return $this->belongsToMany(Order::class);
    }
       public function cartItems(){
           if(is_null($this->cartItems)){
           $this->cartItems=[];
              return $this->cartItems; 
        }
        return $this->cartItems;
    }
     public function addProductToCart(Product $product,$qty=1){
         $cartItems=$this->cartItems();
         $cartItem=new CartItem($product,$qty); 
         array_push($cartItems,$cartItem);
        
    }
    
    public function incrmentProductinCart(Product $product,$qty=1){
          $cartItems=$this->$cartItems();
          foreach($cartItems as $cartItem){
          if($productId==$cartItem->product->id){
              $cartItem->qty+=$qty;
          
          }
    }
   
      public function inItem($productId){
          $cartItems=$this->$cartItem();
          foreach($cartItems as $cartItem){
          if($productId==$cartItem->product->id){
              return true;
          
          }
          }
          return false;
      }
}
