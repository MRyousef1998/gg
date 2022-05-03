<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillabl=[
        'title',
        'description',
        'unit',
        'price',
        'total',
        'discount',
        'option'
            ];
            public function images(){

                return $this->hasMany(Image::class);
            }
            public function reviews(){
                return $this->hasMany(Review::class);
            }
            public function category(){
                return $this->belongsTo(Category::class);
            }
            public function tags(){
                return $this->belongsToMany(Tag::class);
            }
            public function hasUnit(){
                return $this->belongsTo(Unit::class,'unit_id','id');
            }
            public function jsonOption(){
                return json_decode($this->options);
            }
}
