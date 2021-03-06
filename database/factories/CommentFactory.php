<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'content' => $faker->text,
        'commentable_id' => $faker->randomNumber(),
        'commentable_type' => $faker->text,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
