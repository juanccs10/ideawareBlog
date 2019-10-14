<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'content'=>$faker->paragraph(),
        'user_id' => factory('App\User')->create()->id
    ];
});
