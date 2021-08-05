<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Commentaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'content' => $faker->text,
        'commentable_id' => $faker->randomNumber(),
        'commentable_type' => $faker->text,
        'cread_at' => $faker->dateTime(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
