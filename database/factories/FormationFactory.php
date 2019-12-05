<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Formation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'code' => $faker->word,
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});