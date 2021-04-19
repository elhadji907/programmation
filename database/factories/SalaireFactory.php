<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Salaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'montant' => $faker->randomFloat(),
        'prime' => $faker->randomFloat(),
        'note' => $faker->randomNumber(),
        'autre_montant' => $faker->randomFloat(),
        'categories_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
    ];
});
