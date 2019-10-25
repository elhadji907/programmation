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
    $id_direction=App\Direction::get()->random()->id;
    $id_courrier=App\Courrier::get()->random()->id;

    return [
        'directions_id' => function () use($id_direction) {
           /*  return factory(App\Direction::class)->create()->id; */
           return $id_direction;
        },
        'courriers_id' => function () use($id_courrier) {
           /*  return factory(App\Courrier::class)->create()->id; */
           return $id_courrier;
        },
    ];
});
