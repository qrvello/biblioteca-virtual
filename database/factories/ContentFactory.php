<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'author'=>$faker->name,
        'editorial'=>$faker->text(15),
        'title'=>$faker->sentence(2),
        'description'=>$faker->sentence(30),
        'matter'=>$faker->text(5),
        'date_published'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'active' => true,
    ];
});
