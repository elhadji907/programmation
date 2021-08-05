<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\OperateursHasRegion::class, function (Faker $faker) {
    return [
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'regions_id' => function () {
            return factory(App\Region::class)->create()->id;
        },
    ];
});
