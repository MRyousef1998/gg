<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'status' =>$this->faker-> randomElement(['pending','closed','waiting']),
        'title'=>$this->faker->sentence,
        'message'=>$this->faker->paragraph(),

       'user_id'=>$this->faker->numberBetween(1,500),
       'ticket_type_id'=>$this->faker->numberBetween(1,4),
       'order_id'=>$this->faker->numberBetween(1,50),
    ];
});
