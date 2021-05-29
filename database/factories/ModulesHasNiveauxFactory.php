<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ModulesHasNiveaux::class, function (Faker $faker) {
    return [
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
        'niveauxs_id' => function () {
            return factory(App\Niveaux::class)->create()->id;
        },
    ];
});
