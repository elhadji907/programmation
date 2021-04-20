<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Depart::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'destinataire' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
*/

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Depart::class, function (Faker\Generator $faker) {
    $types_courrier_id=App\TypesCourrier::where('name','Courriers departs')->first()->id;
    $annee = date('Y');
    $numero_courrier = date('His');
    return [
        'numero' => 'CD-'.$annee."-".$numero_courrier,
        'destinataire' => SnmG::getFirstName()." ".SnmG::getName(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});