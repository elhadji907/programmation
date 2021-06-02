<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DirectionsHasCourrier::class, function (Faker $faker) {
    return [
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
