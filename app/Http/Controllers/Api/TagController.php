<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\TagResource;
use  App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TagController extends Controller
{
 public function index(){

    return TagResource::collection( Tag::paginate(15)) ;
   }

   public function show($id){
      return new  TagResource(Tag::find($id));
   }
}
