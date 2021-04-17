<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Disponibilite::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
        'date3' => $faker->dateTime(),
    ];
});
