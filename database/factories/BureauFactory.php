<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Bureau::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'divisions_id' => function () {
            return factory(App\Division::class)->create()->id;
        },
    ];
});
