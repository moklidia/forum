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

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'given_name' => $faker->firstName,
        'date_of_birth' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-18 years', $timezone = null),
    ];
});