<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartItem extends Model
{
   public $product;
   public $qtr;  
    public function _construct(Product $product,$qtr){
    $this->product=$product;
        $this->qty=$qtr;
    
    }
    
} 
