<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'titre' => $faker->word,
        'description' => $faker->text,
        'url' => $faker->url,
        'image' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
