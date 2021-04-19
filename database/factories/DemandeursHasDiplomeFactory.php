<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DemandeursHasDiplome::class, function (Faker $faker) {
    return [
        'diplomes_id' => function () {
            return factory(App\Diplome::class)->create()->id;
        },
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
