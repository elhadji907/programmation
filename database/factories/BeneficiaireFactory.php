<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Beneficiaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'villages_id' => function () {
            return factory(App\Village::class)->create()->id;
        },
        'nivauxs_id' => function () {
            return factory(App\Nivaux::class)->create()->id;
        },
        'diplomes_id' => function () {
            return factory(App\Diplome::class)->create()->id;
        },
        'situations_id' => function () {
            return factory(App\Situation::class)->create()->id;
        },
    ];
});
