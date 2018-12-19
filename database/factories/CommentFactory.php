<?php

use Faker\Generator as Faker;

$factory->define(
    App\Models\Comment::class,
    function (Faker $faker) {
        return [
        'user_id' => function () {
            return factory('App\Models\User')->create()->id;
        },
        'post_id' => function () {
            return factory('App\Models\Post')->create()->id;
        },
        'body' => $faker->paragraph,
        ];
    }
);
