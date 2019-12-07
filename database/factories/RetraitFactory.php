<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Retrait::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'telephone' => $faker->word,
        'date' => $faker->dateTime(),
        'evaluations_id' => function () {
            return factory(App\Evaluation::class)->create()->id;
        },
    ];
});
