<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Daf::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'rejet' => $faker->text,
        'date_cg' => $faker->dateTime(),
        'retour' => $faker->word,
        'paye' => $faker->word,
        'observation' => $faker->text,
        'nb_pc' => $faker->word,
        'destinataire' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'num_bord' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'projets_id' => function () {
            return factory(App\Projet::class)->create()->id;
        },
    ];
});
