<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ModulesHasOperateur::class, function (Faker $faker) {
    return [
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});
