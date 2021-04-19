<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Charge::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'duree' => $faker->randomNumber(),
        'accompt' => $faker->randomFloat(),
        'reliquat' => $faker->randomFloat(),
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'ecoles_id' => function () {
            return factory(App\Ecole::class)->create()->id;
        },
        'annee' => $faker->randomNumber(),
    ];
});
