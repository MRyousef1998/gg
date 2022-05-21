<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url'=>"https://picsum.photos/1200/350?random=".mt_rand(1, 55000),
            'product_id'=>$this->faker->numberBetween(1,1500),
           
    ];
});
