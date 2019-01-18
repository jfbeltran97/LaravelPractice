<?php

use Faker\Generator as Faker;


$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'user' => $faker->unique()->username,
        'pass' => $faker->password,
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'birthdate' => $faker->dateTimeBetween('-60 years', '-20'),
        'tipocuenta' => $faker->randomElement(array('basic', 'standard', 'premium')),
        'ciudad' => $faker->city,
        'pais' => $faker->country
    ];
});
