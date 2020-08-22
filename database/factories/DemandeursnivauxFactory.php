<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Demandeursnivaux::class, function (Faker $faker) {
    return [
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'nivauxs_id' => function () {
            return factory(App\Nivaux::class)->create()->id;
        },
    ];
});
