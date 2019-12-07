<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Formationsevaluateur::class, function (Faker $faker) {
    return [
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
        'evaluateurs_id' => function () {
            return factory(App\Evaluateur::class)->create()->id;
        },
    ];
});
