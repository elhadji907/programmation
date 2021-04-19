<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Membre::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'firtname' => $faker->word,
        'cin' => $faker->word,
        'date_naissance' => $faker->dateTime(),
        'lieu_naissance' => $faker->word,
        'niveaux' => $faker->word,
        'experience_domaine' => $faker->text,
        'autre_experience' => $faker->text,
        'titre1' => $faker->word,
        'date1' => $faker->dateTime(),
        'collectives_id' => function () {
            return factory(App\Collective::class)->create()->id;
        },
    ];
});
