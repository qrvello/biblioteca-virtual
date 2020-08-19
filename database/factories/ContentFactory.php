<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Content;
use Faker\Generator as Faker;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'image'=>$faker->imageUrl($width = 362, $height = 200),
        'file'=>$faker->url,
        'author'=>$faker->name,
        'editorial'=>$faker->text,
        'title'=>$faker->sentence(2),
        'description'=>$faker->text(30),
        'matter'=>$faker->name,
        'date_published'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => random_int(1, 5),
        'category_id' => random_int(1, 10),
    ];
});
