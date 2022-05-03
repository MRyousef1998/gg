<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ProductResource;
use  App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        return ProductResource::collection( Product::paginate(15)) ;
       }
    
       public function show($id){
          return new ProductResource(Product::find($id));
       }
}
