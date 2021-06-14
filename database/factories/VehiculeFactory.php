<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Vehicule::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'marque' => $faker->word,
        'type_carburant' => $faker->word,
        'type_carburant' => $faker->randomNumber(),
    ];
});
