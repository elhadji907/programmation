<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Beneficiairessecteur::class, function (Faker $faker) {
    return [
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
        'secteurs_id' => function () {
            return factory(App\Secteur::class)->create()->id;
        },
    ];
});
