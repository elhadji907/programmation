<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\CellulesHasEmployee::class, function (Faker $faker) {
    return [
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'cellules_id' => function () {
            return factory(App\Cellule::class)->create()->id;
        },
    ];
});
