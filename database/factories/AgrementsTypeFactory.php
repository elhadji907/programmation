<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\AgrementsType::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'agrements_id' => function () {
            return factory(App\Agrement::class)->create()->id;
        },
    ];
});
