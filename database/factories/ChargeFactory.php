<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Charge::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'etablissement' => $faker->word,
        'designation' => $faker->text,
        'observations' => $faker->text,
        'date' => $faker->dateTime(),
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'employees_matricule' => $faker->word,
    ];
});
