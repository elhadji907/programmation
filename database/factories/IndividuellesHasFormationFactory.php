<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\IndividuellesHasFormation::class, function (Faker $faker) {
    return [
        'individuelles_id' => function () {
            return factory(App\Individuelle::class)->create()->id;
        },
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
