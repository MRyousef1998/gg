<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'url'=>$this->faker->imageUrl(640, 480, 'animals', true);,
            'product_id'=>$this->faker->numberBetween(1,1500),
           
    ];
});
