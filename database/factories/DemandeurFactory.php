<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Demandeur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
<<<<<<< HEAD
        'numero' => $faker->word,
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        'sexe' => $faker->word,
        'situation_professionnelle' => $faker->word,
        'etablissement' => $faker->word,
        'niveau_etude' => $faker->word,
        'diplome' => $faker->word,
        'qualification' => $faker->word,
        'experience' => $faker->word,
        'deja_forme' => $faker->word,
        'pre_requis' => $faker->word,
        'type' => $faker->word,
        'projet' => $faker->word,
<<<<<<< HEAD
        'situation' => $faker->word,
        'items1' => $faker->word,
        'items2' => $faker->word,
        'items3' => $faker->word,
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'lieux_id' => function () {
            return factory(App\Lieux::class)->create()->id;
        },
<<<<<<< HEAD
=======
        'items1' => $faker->word,
        'items2' => $faker->word,
        'items3' => $faker->word,
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        'items_id' => function () {
            return factory(App\Item::class)->create()->id;
        },
    ];
});
