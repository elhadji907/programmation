<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EtatsPrevi::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_recep' => $faker->dateTime(),
        'designation' => $faker->text,
        'observation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'periode' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dg' => $faker->dateTime(),
        'date_cg' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
