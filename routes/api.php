<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\AuthController;


use  App\Http\Resources\CategoryResource;
use  App\Http\Resources\CountryResource;
use  App\Http\Resources\UserFullResource;
use App\User;



//categories

Route::get('categories','Api\CategoryController@index');
Route::get('categories/{id}','Api\CategoryController@show');
Route::get('categories/{id}/products','Api\CategoryController@product');

// tag
Route::get('tags/{id}','Api\TagController@show');
Route::get('tags','Api\TagController@index');


//products
Route::get('products/{id}','Api\ProductController@show');
Route::get('products','Api\ProductController@index');


//country
Route::get('countries/{id}/states','Api\CountryController@showState');
Route::get('countries/{id}/cities','Api\CountryController@showCity');

Route::get('countries','Api\CountryController@index');

//rigster
Route::post('auth/register','Api\AuthController@register');
Route::post('auth/login','Api\AuthController@login');
Route::post('cart','Api\CartController@AddProductToCart');


Route::get('users', function (Request $request) {
    return UserFullResource::collection(User::paginate(15));
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::middleware('auth:api')->get('products', function (Request $request) {
//    return App\Product::all();
//});

Route::middleware('auth:api')->group( function () {
  Route::post('cart','Api\CartController@AddProductToCart');
});

 
