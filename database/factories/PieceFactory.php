<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Piece::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'piece1' => $faker->word,
        'piece2' => $faker->word,
        'piece3' => $faker->word,
        'piece4' => $faker->word,
        'piece5' => $faker->word,
        'piece6' => $faker->word,
        'piece7' => $faker->word,
        'piece8' => $faker->word,
        'piece9' => $faker->word,
        'piece10' => $faker->word,
        'piece11' => $faker->word,
        'piece12' => $faker->word,
        'piece13' => $faker->word,
        'piece14' => $faker->word,
        'piece15' => $faker->word,
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
