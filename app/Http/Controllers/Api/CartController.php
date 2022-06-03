<?php

namespace App\Http\Controllers\Api;
use  App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Cart;

class CartController extends Controller
{
    
        public function index(Request $request){
            $user=Auth::user();
            $cart=$this->conectionState($user->cart);

        }
    private function conectionState(Cart $cart){
        if(is_null($cart)){
            $cart=new Cart();
            $cart->cart_item=[];
            $cart->total=0;
            return $cart;
        }
        return $cart;
    
    
    }
       


}
