<?php

use Faker\Generator as Faker;

$factory->define(
    App\Models\Point::class, function (Faker $faker) {
        return [
        'points' => $faker->optional($weight = 0.4, $default = 5)->numberBetween($min = 2, $max = 5),
        ];
    }
);
