<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ModulesHasAgrement::class, function (Faker $faker) {
    return [
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
        'agrements_id' => function () {
            return factory(App\Agrement::class)->create()->id;
        },
    ];
});
