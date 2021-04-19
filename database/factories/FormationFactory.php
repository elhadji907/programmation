<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Formation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'code' => $faker->randomNumber(),
        'name' => $faker->name,
        'qualifications' => $faker->word,
        'effectif_total' => $faker->word,
        'date_pv' => $faker->dateTime(),
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'adresse' => $faker->word,
        'prevue_h' => $faker->randomNumber(),
        'prevue_f' => $faker->randomNumber(),
        'type' => $faker->word,
        'titre' => $faker->word,
        'attestation' => $faker->word,
        'forme_h' => $faker->randomNumber(),
        'forme_f' => $faker->randomNumber(),
        'total' => $faker->randomNumber(),
        'lieu' => $faker->word,
        'convention_col' => $faker->word,
        'decret' => $faker->word,
        'ingenieurs_id' => function () {
            return factory(App\Ingenieur::class)->create()->id;
        },
        'factures_id' => function () {
            return factory(App\Facture::class)->create()->id;
        },
        'agents_id' => function () {
            return factory(App\Agent::class)->create()->id;
        },
        'detfs_id' => function () {
            return factory(App\Detf::class)->create()->id;
        },
        'conventions_id' => function () {
            return factory(App\Convention::class)->create()->id;
        },
<<<<<<< HEAD
=======
        'nivaux_id' => function () {
            return factory(App\Niveaux::class)->create()->id;
        },
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'traitements_id' => function () {
            return factory(App\Traitement::class)->create()->id;
<<<<<<< HEAD
        },
        'niveauxs_id' => function () {
            return factory(App\Niveaux::class)->create()->id;
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        },
    ];
});
