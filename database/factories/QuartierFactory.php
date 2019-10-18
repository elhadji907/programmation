<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Quartier::class, function (Faker $faker) {
    return [
        'villages_id' => function () {
            return factory(App\Village::class)->create()->id;
        },
        'villes_id' => function () {
            return factory(App\Ville::class)->create()->id;
        },
    ];
});
