<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail(),
       'email_verified' =>$faker-> randomElement([false,true]),
        'mobile' =>$faker->phoneNumber(),
        'mobile_verifited' =>$faker-> randomElement([false,true]),

       'shipping_address'=>$faker->numberBetween(1,1000),
       'billing_address'=>$faker->numberBetween(1,1000),
       'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'api_token'=>bin2hex(openssl_random_pseudo_bytes(30)),
       'remember_token' => Str::random(10),
    ];
});
