<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Ville::class, function (Faker $faker) {
    return [
        'communes_id' => function () {
            return factory(App\Commune::class)->create()->id;
        },
    ];
});
