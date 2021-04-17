<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EvaluationsHasEvaluateur::class, function (Faker $faker) {
    return [
        'evaluateurs_id' => function () {
            return factory(App\Evaluateur::class)->create()->id;
        },
        'evaluations_id' => function () {
            return factory(App\Evaluation::class)->create()->id;
        },
    ];
});
