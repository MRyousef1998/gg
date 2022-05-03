<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function products()
    {
        return hasMany(Product::class);
    }
}
