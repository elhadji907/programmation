<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Commune::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'adresse' => $faker->word,
        'arrondissements_id' => function () {
            return factory(App\Arrondissement::class)->create()->id;
        },
    ];
});
