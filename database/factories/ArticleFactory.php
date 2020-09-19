<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {

    return [
        'title'=>$faker->sentence(mt_rand(3,20)),
        'content'=>$faker->paragraph(mt_rand(3,10)),
        'published_at'=>$faker->dateTimeBetween('-1 month','3 days'),
        'user_id'=>$faker->numberBetween(1,20),
        'sId'=>$faker->numberBetween(1,5),
        'repliesStr'=>getFakeRepliesId(mt_rand(1,10),100),
    ];
});
