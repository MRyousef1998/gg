<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartItem 
{
   public $product;
   public $qtr;  
    public function _construct($product,$qtr){
    $this->product=$product;
        $this->qty=$qtr;
    
    }
    
} 
