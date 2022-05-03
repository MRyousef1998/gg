<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url'=>$this->faker->imageUrl(800,600),
            'product_id'=>$this->faker->numberBetween(1,3000),
           
    ];
});
