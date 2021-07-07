<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meal;
use Faker\Generator as Faker;

$factory->define(Meal::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'photo' => $faker->image(),
        'description' => $faker->paragraph(),
        'quantite_in_stock' => $faker->randomDigit,
        'buy_price' => $faker->randomFloat(2,0,99999),
        'sale_price' => $faker->randomFloat(2,0,99999),
        'created_at' => now()
    ];
});
