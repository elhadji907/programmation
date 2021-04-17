<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Reglement::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'date' => $faker->dateTime(),
        'montant' => $faker->randomFloat(),
        'types_id' => function () {
            return factory(App\Type::class)->create()->id;
        },
        'factures_id' => function () {
            return factory(App\Facture::class)->create()->id;
        },
        'comptables_id' => function () {
            return factory(App\Comptable::class)->create()->id;
        },
    ];
});
