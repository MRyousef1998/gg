<?php

namespace App\Http\Controllers\Api;
use  App\Http\Resources\CategoryResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Category;

class CategoryController extends Controller
{
    
        public function index(){
            return CategoryResource::collection( Category::paginate(15)) ;

        }
        public function show($id){
            return new CategoryResource(Category::find($id));
         }


}
