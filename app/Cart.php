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
       public function cartItem(){
        return $this->belongsToMany(Order::class);
    }
   
      public function inItem(){
        return $this->belongsToMany(Order::class);
      }
}
