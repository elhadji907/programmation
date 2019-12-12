<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Programme::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'debut' => $faker->dateTime(),
        'fin' => $faker->dateTime(),
        'effectif' => $faker->randomNumber(),
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'demandeformations_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
