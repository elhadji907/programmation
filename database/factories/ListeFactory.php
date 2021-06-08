<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Liste::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'destinataire' => $faker->word,
        'date' => $faker->dateTime(),
        'name' => $faker->name,
        'liste' => $faker->word,
    ];
}); */


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_liste = autoIncremente_liste();

$factory->define(App\Liste::class, function (Faker\Generator $faker) use ($autoIncremente_liste) {
    $autoIncremente_liste->next();
    $annee = date('y');

    return [
        'numero' => 'Feuil'.$autoIncremente_liste->current()."_".$annee,
        'destinataire' => $faker->name,
        'date' => $faker->dateTime(),
        'name' => $faker->name,
        'liste' => '',
    ];
});

function autoIncremente_liste()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}