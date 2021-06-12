<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EvaluateursHasModule::class, function (Faker $faker) {
    return [
        'evaluateurs_id' => function () {
            return factory(App\Evaluateur::class)->create()->id;
        },
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});
