<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Responsable::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
        'prenom' => $faker->word,
        'nom' => $faker->word,
        'email' => $faker->safeEmail,
        'telephone' => $faker->word,
        'adresse' => $faker->word,
        'fonction' => $faker->word,
        'date' => $faker->dateTime(),
    ];
});
