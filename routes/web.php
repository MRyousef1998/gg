<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('user', function () {
    return App\User::paginate(10);
});
Route::get('city', function () {
  return App\City::paginate(50);
});


Route::get('states', function () {
    return App\State::with(['cities','country'])->paginate(50);
  })->name('ww');


  Route::get('testTag', function () {
    $tag=App\Tag::find(2);
    return $tag->products;
    
});
Route::get('u', function () {
  $tag=App\Product::find(2);
  return $tag->hasUnit;
  
});

  Route::get('test', function () {
    return 'heelo';
  })->middleware(['auth','user_is_support']);

  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
