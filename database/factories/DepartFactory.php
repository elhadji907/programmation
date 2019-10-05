<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Depart::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'objet' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
