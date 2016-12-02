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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {

    return [
        'rut' => $faker->randomNumber(),
        'bs_name' => $faker->bs,
        'name' => $faker->company,
        'contact_name' => $faker->name,
        'position' => $faker->jobTitle,
        'phone1' => $faker->e164PhoneNumber,
        'email1' => $faker->email,
        'web' => $faker->safeEmailDomain,
        'next_mng' => $faker->dateTimeBetween('- 7 days', 'now'),
        'user_id' => 1
    ];
});
