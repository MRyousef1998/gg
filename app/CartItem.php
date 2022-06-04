<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class CartItem 
{
   public Product $product;
   public int $qtr;  
    public function __construct(Product $product,$qtr){
        return  $product;
    $this->product=$product;
        $this->qty=$qtr;
    
    }
    
} 
