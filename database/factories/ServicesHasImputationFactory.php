<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ServicesHasImputation::class, function (Faker $faker) {
    return [
        'services_id' => function () {
            return factory(App\Service::class)->create()->id;
        },
        'imputations_id' => function () {
            return factory(App\Imputation::class)->create()->id;
        },
    ];
});
