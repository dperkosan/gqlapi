<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Club;
use Faker\Generator as Faker;

$factory->define(Club::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image' => $faker->imageUrl(640, 480),
        'phone' => $faker->tollFreePhoneNumber,
    ];
});

$factory->state(Club::class, 'is_klabana', [
    'klabana' => 1,
]);
