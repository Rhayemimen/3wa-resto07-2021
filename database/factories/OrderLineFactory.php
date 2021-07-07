<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderLine;
use App\Meal;
use App\Order;
use Faker\Generator as Faker;

$factory->define(OrderLine::class, function (Faker $faker) {
    return [
        'quantite_ordred' => $faker->randomDigitNotNull,
        'meal_id' => Meal::get('id')->random(),
        'order_id' => Order::get('id')->random(),
        'price_each' => $faker->randomFloat(2,0,99999),
        'created_at' => now()
    ];
});
