<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Basket;
use Faker\Generator as Faker;

$factory->define(Basket::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 5)
    ];
});
