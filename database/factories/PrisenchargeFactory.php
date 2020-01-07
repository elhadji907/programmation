<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Prisencharge::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'structure' => $faker->word,
        'montant' => $faker->randomFloat(),
        'date' => $faker->dateTime(),
        'familles_id' => function () {
            return factory(App\Famille::class)->create()->id;
        },
    ];
});
