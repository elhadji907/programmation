<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
        'specialites_id' => function () {
            return factory(App\Specialite::class)->create()->id;
        },
        'qualification' => $faker->word,
        'statuts_id' => function () {
            return factory(App\Statut::class)->create()->id;
        },
    ];
});
