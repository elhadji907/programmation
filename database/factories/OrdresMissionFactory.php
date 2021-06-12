<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\OrdresMission::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_recep' => $faker->dateTime(),
        'beneficiaire' => $faker->word,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dg' => $faker->dateTime(),
        'date_cg' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
