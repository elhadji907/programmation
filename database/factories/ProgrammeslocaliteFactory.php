<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Programmeslocalite::class, function (Faker $faker) {
    return [
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
        'localites_id' => function () {
            return factory(App\Localite::class)->create()->id;
        },
    ];
});
