<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Statut::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'niveau' => $faker->randomNumber(),
        'details' => $faker->word,
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
        'date3' => $faker->dateTime(),
        'date5' => $faker->dateTime(),
        'date6' => $faker->dateTime(),
        'date7' => $faker->dateTime(),
        'date8' => $faker->dateTime(),
        'date9' => $faker->dateTime(),
        'date10' => $faker->dateTime(),
    ];
});
