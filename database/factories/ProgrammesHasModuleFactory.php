<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ProgrammesHasModule::class, function (Faker $faker) {
    return [
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
    ];
});
