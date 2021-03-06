<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'id' => $faker->word,
        'type' => $faker->word,
        'notifiable_type' => $faker->word,
        'notifiable_id' => $faker->randomNumber(),
        'data' => $faker->text,
        'read_at' => $faker->dateTime(),
    ];
});
