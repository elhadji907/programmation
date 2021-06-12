<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DemandeursHasDisponibilite::class, function (Faker $faker) {
    return [
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'disponibilites_id' => function () {
            return factory(App\Disponibilite::class)->create()->id;
        },
    ];
});
