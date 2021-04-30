<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Banque::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'dafs_id' => function () {
            return factory(App\Daf::class)->create()->id;
        },
        'projets_id' => function () {
            return factory(App\Projet::class)->create()->id;
        },
    ];
});
