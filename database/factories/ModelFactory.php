<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

// Use faker create data for students table
$factory->define(App\Student::class, function ($faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->year('-15 year'),
        'address' => $faker->city,
        'gender' => $faker->numberBetween(0,1),
    ];
});
