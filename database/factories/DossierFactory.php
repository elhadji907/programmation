<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Dossier::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'dossier1' => $faker->word,
        'dossier2' => $faker->word,
        'dossier3' => $faker->word,
        'dossier4' => $faker->word,
        'dossier5' => $faker->word,
        'dossier6' => $faker->word,
        'dossier7' => $faker->word,
        'dossier8' => $faker->word,
        'dossier9' => $faker->word,
        'dossier10' => $faker->word,
        'dossier11' => $faker->word,
        'dossier12' => $faker->word,
        'dossier13' => $faker->word,
        'dossier14' => $faker->word,
        'dossier15' => $faker->word,
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
