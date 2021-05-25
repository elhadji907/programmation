<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Banque::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'numero' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
