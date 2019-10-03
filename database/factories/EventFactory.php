<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'start_time' => $faker->dateTimeBetween('-3 days', '+ 10 days'),
        'end_time' => $faker->dateTimeBetween('+11 days', '+ 20 days'),
        'place' => $faker->city,
        'country' => $faker->state,
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'zip' => $faker->postcode,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'image' => $faker->imageUrl(640, 480),
    ];
});
