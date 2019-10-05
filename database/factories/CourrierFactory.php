<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Courrier::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'types' => $faker->word,
        'message' => $faker->word,
        'destinataire' => $faker->word,
        'fichier' => $faker->word,
        'statut' => $faker->word,
        'date' => $faker->dateTime(),
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'types_courriers_id' => function () {
            return factory(App\TypesCourrier::class)->create()->id;
        },
    ];
});
