<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Beneficiairesformation::class, function (Faker $faker) {
    return [
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
