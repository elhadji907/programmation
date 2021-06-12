<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Salaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'charges_patronale' => $faker->randomFloat(),
        'charge_salariale' => $faker->randomFloat(),
        'brut' => $faker->randomFloat(),
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
