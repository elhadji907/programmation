<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Formation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'code' => $faker->word,
        'typesformations_id' => function () {
            return factory(App\Typesformation::class)->create()->id;
        },
        'certifications_id' => function () {
            return factory(App\Certification::class)->create()->id;
        },
    ];
});
