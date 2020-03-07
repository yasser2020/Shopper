<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->sentence(5),
        'category_description' => $faker->sentence(20),
        'publication_status'=>$faker->numberBetween($min = 0, $max = 1),
    ];
});


