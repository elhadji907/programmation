<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Diplome::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'autre' => $faker->word,
        'options_id' => function () {
            return factory(App\Option::class)->create()->id;
        },
    ];
});
