<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url'=>$this->faker->image('public/storage/test-images', 640, 480, null, false),
            'product_id'=>$this->faker->numberBetween(1,3000),
           
    ];
});
