<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(mt_rand(3,20)),
        'content'=>$faker->paragraph(mt_rand(3,10)),
        'published_at'=>$faker->dateTimeBetween('-1 month','3 days'),
        'publisherId'=>$faker->numberBetween(1,20),
        'sId'=>$faker->numberBetween(1,5),
        'goodQuestionCount'=>0,
        'repliesStr'=>getFakeRepliesId(mt_rand(1,10),100),
    ];
});
