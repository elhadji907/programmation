<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Domaine::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'secteurs_id' => function () {
            return factory(App\Secteur::class)->create()->id;
        },
    ];
});
