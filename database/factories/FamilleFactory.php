<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Famille::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'civilite' => $faker->word,
        'prenom' => $faker->word,
        'nom' => $faker->word,
        'date' => $faker->dateTime(),
        'lieu' => $faker->word,
        'status' => $faker->word,
        'adresse' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->safeEmail,
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'employees_matricule' => $faker->word,
    ];
});
