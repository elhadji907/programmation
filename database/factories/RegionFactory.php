<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'nom' => $faker->word,
    ];
});
