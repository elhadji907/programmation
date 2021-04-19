<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Evaluation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'date' => $faker->dateTime(),
        'note' => $faker->randomFloat(),
        'appreciation' => $faker->word,
        'mention' => $faker->word,
    ];
});
