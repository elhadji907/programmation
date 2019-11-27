<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Beneficiairesdomaine::class, function (Faker $faker) {
    return [
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});
