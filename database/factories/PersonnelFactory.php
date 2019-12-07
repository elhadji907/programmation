<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Personnel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'debut' => $faker->dateTime(),
        'fin' => $faker->dateTime(),
        'nbrefant' => $faker->randomNumber(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
    ];
});
