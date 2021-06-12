<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Conger::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
