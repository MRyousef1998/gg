<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title'=>$this->faker->sentence,
        'description'=>$this->faker->paragraph(5),
        'unit'=>$this->faker->numberBetween(1,113),
        'price'=>$this->faker->randomFloat(2,10,500),
        'category_id'=>$this->faker->numberBetween(1,50),

        'total'=>$this->faker->numberBetween(2,250),
        
   
    ];
});
