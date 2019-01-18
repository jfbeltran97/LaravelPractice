<?php

use Faker\Generator as Faker;


$factory->define(App\MovieLog::class, function (Faker $faker) {
    return [
        'user' => $faker->username,
        'movie' => $faker->sentence(5),
        'watched' => $faker->dateTime
    ];
});
