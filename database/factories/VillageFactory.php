<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Village::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'chef_id' => $faker->randomNumber(),
        'communes_id' => function () {
            return factory(App\Commune::class)->create()->id;
        },
    ];
});
