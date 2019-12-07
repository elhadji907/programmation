<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Courrier::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'objet' => $faker->word,
        'expediteur' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->safeEmail,
        'adresse' => $faker->word,
        'fax' => $faker->word,
        'bp' => $faker->word,
        'type' => $faker->word,
        'message' => $faker->word,
        'legende' => $faker->word,
        'file' => $faker->word,
        'statut' => $faker->word,
        'date' => $faker->dateTime(),
        'types_courriers_id' => function () {
            return factory(App\TypesCourrier::class)->create()->id;
        },
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
    ];
});
