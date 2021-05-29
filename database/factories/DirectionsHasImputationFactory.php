<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DirectionsHasImputation::class, function (Faker $faker) {
    return [
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
        'imputations_id' => function () {
            return factory(App\Imputation::class)->create()->id;
        },
    ];
});
