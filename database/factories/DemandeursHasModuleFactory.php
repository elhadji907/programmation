<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DemandeursHasModule::class, function (Faker $faker) {
    return [
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});
