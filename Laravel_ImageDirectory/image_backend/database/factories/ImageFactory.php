<?php

use Faker\Generator as Faker;

/*
|
|--------------------------------------------------------------------------
| Model Factories || NOT USED !!
|--------------------------------------------------------------------------
|
*/

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
