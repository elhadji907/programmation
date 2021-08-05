<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Agrement::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'rccm' => $faker->word,
        'quitus' => $faker->word,
        'ninea' => $faker->word,
        'adresse' => $faker->word,
        'email' => $faker->safeEmail,
        'telephone' => $faker->word,
        'fixe' => $faker->word,
        'bp' => $faker->word,
        'fax' => $faker->word,
        'prenom_responsable' => $faker->word,
        'nom_responsable' => $faker->word,
        'email_responsable' => $faker->word,
        'telephone_responsabel' => $faker->word,
        'type' => $faker->word,
        'details' => $faker->word,
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
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
        'departements_id' => function () {
            return factory(App\Departement::class)->create()->id;
        },
    ];
});
