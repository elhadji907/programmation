<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Imputation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'destinataire' => $faker->word,
        'sigle' => $faker->word,
        'date' => $faker->dateTime(),
    ];
});
