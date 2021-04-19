<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\OperateursHasNiveaux::class, function (Faker $faker) {
    return [
        'niveaux_id' => function () {
            return factory(App\Niveaux::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
    ];
});
