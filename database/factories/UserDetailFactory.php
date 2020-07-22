<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserDetail;
use Faker\Generator as Faker;

$factory->define(UserDetail::class, function (Faker $faker) {
    return [
        'isBanned'=>$faker->boolean(),
        'slogan'=>$faker->sentence(2,5),
    ];
});
