<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartItem 
{
   public $product;
   public $qtr;  
    public function __construct(Product $product,$qtr){
        return  $product;
    $this->product=$product;
        $this->qty=$qtr;
    
    }
    
} 
