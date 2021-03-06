<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Titre::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'titre1' => $faker->word,
        'date1' => $faker->dateTime(),
    ];
});
