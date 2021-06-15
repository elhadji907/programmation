<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Depense::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'designation' => $faker->text,
        'fournisseurs' => $faker->text,
        'montant' => $faker->randomFloat(),
        'tva' => $faker->randomFloat(),
        'ir' => $faker->randomFloat(),
        'autre_montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'activites_id' => function () {
            return factory(App\Activite::class)->create()->id;
        },
        'projets_id' => $faker->randomNumber(),
    ];
});
