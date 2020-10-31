<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publication;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        // 'user_id'=>random_int(1, 5),
        'title'=>$faker->sentence(2),
        'description'=>$faker->text(30),
        'publication_category_id'=> random_int(1, 3)
    ];
});
