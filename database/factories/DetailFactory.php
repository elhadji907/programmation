<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Detail::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'observations' => $faker->text,
        'motif' => $faker->word,
        'name' => $faker->name,
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
