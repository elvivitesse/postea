<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'image' => $faker->imageUrl(400, 300),
        //'image' => $faker->image('public/img', 400, 300, null, false),
        //'image' => file($faker->image(400, 300))->store('posts/' .Post::user_id(), 'public'),
        'content' => $faker->paragraph(3),
    ];
});
