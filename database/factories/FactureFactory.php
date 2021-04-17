<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Facture::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_etablissement' => $faker->dateTime(),
        'details' => $faker->word,
        'montant1' => $faker->randomFloat(),
        'montant2' => $faker->randomFloat(),
        'autre_montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
    ];
});
