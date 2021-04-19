<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Detf::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'titre1' => $faker->word,
        'titre2' => $faker->word,
        'date1' => $faker->dateTime(),
    ];
});
