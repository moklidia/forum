<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Group::class, function (Faker $faker) {
    return [
        'group_name' => $faker->randomLetter,
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'student_id' => factory('App\Models\Student')->create()->id,
    ];
});