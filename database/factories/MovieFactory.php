<?php

use Faker\Generator as Faker;


$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence(5),
        'director' => $faker->name,
        'cast' => $faker->name.', '.$faker->name,
        'plan' => $faker->randomElement(array('basic', 'standard', 'premium')),
        'rating' => $faker->numberBetween(1,5)
    ];
});
