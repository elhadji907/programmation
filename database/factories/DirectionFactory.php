<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Direction::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'chef_id' => $faker->randomNumber(),
        'types_directions_id' => function () {
            return factory(App\TypesDirection::class)->create()->id;
        },
    ];
});