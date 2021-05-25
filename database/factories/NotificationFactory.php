<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'type' => $faker->word,
        'notifiable' => $faker->randomNumber(),
        'data' => $faker->text,
        'read_at' => $faker->dateTime(),
    ];
});
