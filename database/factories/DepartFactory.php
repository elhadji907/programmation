<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Depart::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'numero' => $faker->word,
//         'destinataire' => $faker->word,
//         'courriers_id' => function () {
//             return factory(App\Courrier::class)->create()->id;
//         },
//     ];
// });

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente = autoIncremente();

$factory->define(App\Depart::class, function (Faker\Generator $faker) use ($autoIncremente) {
    $autoIncremente->next();

    $types_courrier_id=App\TypesCourrier::where('name','Courriers departs')->first()->id;
    $annee = date('y');
    $numero_courrier = date('His');
    
    return [
        'numero' => 'CD'.$autoIncremente->current()."".$annee,
        'destinataire' => SnmG::getFirstName()." ".SnmG::getName(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});

function autoIncremente()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}