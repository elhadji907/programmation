<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ProgrammesHasRegion::class, function (Faker $faker) {
    return [
        'regions_id' => function () {
            return factory(App\Region::class)->create()->id;
        },
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
    ];
});
