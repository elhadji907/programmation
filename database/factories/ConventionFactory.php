<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Convention::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'date' => $faker->dateTime(),
        'items1' => $faker->word,
        'items2' => $faker->word,
    ];
});
