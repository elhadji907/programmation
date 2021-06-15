<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Projet::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'debut' => $faker->dateTime(),
        'fin' => $faker->dateTime(),
        'budjet' => $faker->randomFloat(),
        'locatite' => $faker->text,
        'depenses_id' => function () {
            return factory(App\Depense::class)->create()->id;
        },
    ];
});
