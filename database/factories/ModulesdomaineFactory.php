<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Modulesdomaine::class, function (Faker $faker) {
    return [
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});
