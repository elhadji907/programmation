<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Interne::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
*/

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Interne::class, function (Faker\Generator $faker) {
    $types_courrier_id=App\TypesCourrier::where('name','Courriers internes')->first()->id;
    $annee = date('Y');

    $numero_courrier = date('His');
    return [
        'numero' => 'CI-'.$annee."-".$numero_courrier,
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});
