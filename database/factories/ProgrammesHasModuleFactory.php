<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ProgrammesHasModule::class, function (Faker $faker) {
    return [
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});
