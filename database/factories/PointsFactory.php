<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Point::class, function (Faker $faker) {
    return [
        'points' => $faker->numberBetween($min = 2, $max = 5),
    ];
});
