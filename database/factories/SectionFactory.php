<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Section;
use Faker\Generator as Faker;

$factory->define(Section::class, function (Faker $faker) {
    return [
        'title'=>$faker->word(),
        'description'=>$faker->paragraph(mt_rand(3,5)),
        'postCount'=>$faker->numberBetween(0,20),
        'published_at'=>$faker->dateTimeBetween('-1 month','+3days'),
    ];
});
