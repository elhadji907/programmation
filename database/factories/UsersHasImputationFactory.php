<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\UsersHasImputation::class, function (Faker $faker) {
    return [
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'imputations_id' => function () {
            return factory(App\Imputation::class)->create()->id;
        },
    ];
});
