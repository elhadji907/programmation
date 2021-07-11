<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\CollectivesHasFormation::class, function (Faker $faker) {
    return [
        'collectives_id' => function () {
            return factory(App\Collective::class)->create()->id;
        },
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
