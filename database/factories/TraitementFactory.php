<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Traitement::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'observations' => $faker->text,
        'motif' => $faker->word,
        'name' => $faker->name,
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
    ];
});
