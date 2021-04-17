<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Evaluateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'telephone' => $faker->word,
        'email' => $faker->safeEmail,
        'adresse' => $faker->word,
        'date' => $faker->dateTime(),
        'fonction' => $faker->word,
        'appreciation' => $faker->word,
    ];
});
