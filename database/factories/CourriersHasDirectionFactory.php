<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\CourriersHasDirection::class, function (Faker $faker) {
//     return [
//         'directions_id' => function () {
//             return factory(App\Direction::class)->create()->id;
//         },
//         'courriers_id' => function () {
//             return factory(App\Courrier::class)->create()->id;
//         },
//     ];
// });


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\CourriersHasDirection::class, function (Faker\Generator $faker) {
    return [
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
