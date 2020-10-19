<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publication;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        // 'user_id'=>random_int(1, 5),
        'title'=>$faker->sentence(2),
        'image' => 'example' . random_int(1, 9) . '.jpg',
        'description'=>$faker->text(30),
        'publication_category_id'=> random_int(1, 3)
    ];
});
