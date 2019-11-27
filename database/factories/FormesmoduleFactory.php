<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Formesmodule::class, function (Faker $faker) {
    return [
        'formes_id' => function () {
            return factory(App\Forme::class)->create()->id;
        },
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});
