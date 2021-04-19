<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Beneficiaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'date' => $faker->dateTime(),
        'lieu' => $faker->word,
        'village_id' => function () {
            return factory(App\Village::class)->create()->id;
        },
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
