<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'slug'        => $faker->unique()->word,
        'price'       => $faker->randomNumber(2),
        'content'     => '<p>' . implode('</p><p>',
                $faker->paragraphs($nbWords = 20)) . '</p>',
    ];
});
