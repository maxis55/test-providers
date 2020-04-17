<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'        => $unique_name = $faker->unique()->word,
        'slug'        => $unique_name,
        'content' => '<p>' . implode('</p><p>',
                $faker->paragraphs($nbWords = 10)) . '</p>',
    ];
});
