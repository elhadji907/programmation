<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Courriersdirection::class, function (Faker $faker) {
    return [
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
    ];
});
