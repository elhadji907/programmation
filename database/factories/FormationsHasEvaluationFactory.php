<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\FormationsHasEvaluation::class, function (Faker $faker) {
    return [
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
        'evaluations_id' => function () {
            return factory(App\Evaluation::class)->create()->id;
        },
    ];
});
