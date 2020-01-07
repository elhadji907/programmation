<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Famille::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'firstname' => $faker->firstName,
        'name' => $faker->name,
        'date_naissance' => $faker->dateTime(),
        'lieu_naissance' => $faker->word,
        'lien' => $faker->word,
        'sexe' => $faker->word,
        'personnels_id' => function () {
            return factory(App\Personnel::class)->create()->id;
        },
    ];
});
