<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'description' => $faker->text(20),
        'category_id' => random_int(1, 5)
    ];
});
