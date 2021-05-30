<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Direction::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'types_directions_id' => $faker->randomNumber(),
        'imputations_id' => function () {
            return factory(App\Imputation::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'chef_id' => $faker->randomNumber(),
    ];
});
