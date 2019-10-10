<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Recue::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'objet' => $faker->word,
//         'courriers_id' => function () {
//             return factory(App\Courrier::class)->create()->id;
//         },
//     ];
// });

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Recue::class, function (Faker\Generator $faker) {
    $types_courrier_id=App\TypesCourrier::where('name','Courriers arrives')->first()->id;
    return [
        'objet' => $faker->word,
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});
