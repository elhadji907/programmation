<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Bordereau::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'numero_mandat' => $faker->randomNumber(),
        'date_mandat' => $faker->dateTime(),
        'designation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'nombre_de_piece' => $faker->randomNumber(),
        'observation' => $faker->text,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'listes_id' => function () {
            return factory(App\Liste::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_bd = autoIncremente_bd();

$factory->define(App\Bordereau::class, function (Faker\Generator $faker) use ($autoIncremente_bd) {
    $autoIncremente_bd->next();

    $types_courrier_id=App\TypesCourrier::where('name','Bordereau')->first()->id;
    $annee = date('y');
    $numero_courrier = date('His');

    $liste_id=App\Liste::all()->random()->id;
    
    return [
        'numero' => 'BD'.$autoIncremente_bd->current()."".$annee,
        'numero_mandat' => $faker->randomNumber(),
        'date_mandat' => $faker->dateTime(),
        'designation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'nombre_de_piece' => $faker->randomNumber(),
        'observation' => $faker->text,
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
        'listes_id' => function () use($liste_id) {
            return $liste_id;
        },
    ];
});

function autoIncremente_bd()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}