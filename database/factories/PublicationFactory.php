<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publication;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        // 'user_id'=>random_int(1, 5),
        'title'=>$faker->title,
        'image'=>$faker->imageUrl($width = 640, $height = 480),
        'file'=>$faker->url,
        'description'=>$faker->text(30),
    ];
});
