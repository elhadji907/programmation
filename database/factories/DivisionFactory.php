<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Division::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
    ];
});
