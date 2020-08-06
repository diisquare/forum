<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'content'=>$faker->paragraph(mt_rand(3,10)),
        'published_at'=>$faker->dateTimeBetween('-1 month','3 days'),
        'fatherId'=>0,
        'topic'=>$faker->numberBetween(0,1),
        'topicId'=>$faker->numberBetween(1,20),
        'publisherId'=>$faker->numberBetween(1,20),
        'agreeCount'=>0,
    ];
});
