<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\BeneficiairesHasFormation::class, function (Faker $faker) {
    return [
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
    ];
});
