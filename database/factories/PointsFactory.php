<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Point::class, function (Faker $faker) {
    return [
        'student_id' => factory('App\Models\Student')->create()->id,
        'subject_id' => factory('App\Models\Subject')->create()->id,
        'points' => $faker->numberBetween($min = 2, $max = 5),
    ];
});
