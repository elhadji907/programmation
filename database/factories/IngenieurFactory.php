<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Ingenieur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->safeEmail,
        'specialite' => $faker->word,
        'date' => $faker->dateTime(),
        'items1' => $faker->word,
        'items2' => $faker->word,
    ];
});
