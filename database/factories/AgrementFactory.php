<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Agrement::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'rccm' => $faker->word,
        'quitus' => $faker->word,
        'ninea' => $faker->word,
        'adresse' => $faker->word,
        'bp' => $faker->word,
        'email' => $faker->safeEmail,
        'prenom' => $faker->word,
        'nom' => $faker->word,
        'region' => $faker->word,
        'departement' => $faker->word,
        'commune' => $faker->word,
        'type' => $faker->word,
        'details' => $faker->word,
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'responsables_id' => function () {
            return factory(App\Responsable::class)->create()->id;
        },
        'quitus_id' => function () {
            return factory(App\Quitus::class)->create()->id;
        },
        'rccms_id' => function () {
            return factory(App\Rccm::class)->create()->id;
        },
        'nineas_id' => function () {
            return factory(App\Ninea::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
