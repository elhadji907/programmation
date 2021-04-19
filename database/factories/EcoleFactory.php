<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Ecole::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'sigle' => $faker->word,
        'telephone1' => $faker->word,
        'telephone2' => $faker->word,
        'fixe' => $faker->word,
        'email' => $faker->safeEmail,
        'adresse' => $faker->word,
        'regions_id' => function () {
            return factory(App\Region::class)->create()->id;
        },
    ];
});
