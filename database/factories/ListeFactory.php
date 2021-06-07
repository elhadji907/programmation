<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Liste::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'sigle' => $faker->word,
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_liste = autoIncremente_liste();

$factory->define(App\Liste::class, function (Faker\Generator $faker) use ($autoIncremente_liste) {
    $autoIncremente_liste->next();
    $annee = date('y');

    return [
        'numero' => 'Liste'.$autoIncremente_liste->current()."_".$annee,
        'name' => $faker->name,
        'sigle' => $faker->word,
    ];
});

function autoIncremente_liste()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}