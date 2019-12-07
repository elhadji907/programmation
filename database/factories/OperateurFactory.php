<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Operateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'numero' => $faker->word,
        'name' => $faker->name,
        'ninea' => $faker->word,
        'email' => $faker->safeEmail,
        'telephone' => $faker->word,
        'registre' => $faker->word,
        'quitus' => $faker->word,
        'status' => $faker->word,
        'agreer' => $faker->word,
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'structures_id' => function () {
            return factory(App\Structure::class)->create()->id;
        },
    ];
});
