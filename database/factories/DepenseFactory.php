<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Depense::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'designation' => $faker->text,
        'fournisseurs' => $faker->text,
        'montant' => $faker->randomFloat(),
        'tva' => $faker->randomFloat(),
        'ir' => $faker->randomFloat(),
        'autre_montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'activites_id' => function () {
            return factory(App\Activite::class)->create()->id;
        },
        'projets_id' => $faker->randomNumber(),
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_dep = autoIncremente_dep();

$factory->define(App\Depense::class, function (Faker\Generator $faker) use ($autoIncremente_dep) {
    $autoIncremente_dep->next();

    
    $activites_id=App\Activite::all()->random()->id;    
    $projets_id=App\Projet::all()->random()->id;

    return [
        'numero' => $autoIncremente_dep->current(),
        'designation' => $faker->paragraph(1),
        'fournisseurs' => SnmG::getFirstName()." ".SnmG::getName(),
        'montant' => $faker->randomFloat(),
        'tva' => $faker->randomFloat(),
        'ir' => $faker->randomFloat(),
        'autre_montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'activites_id' => function () use($activites_id) {
            return $activites_id;
        },
        'projets_id' => function () use($projets_id) {
            return $projets_id;
        },
    ];
});

function autoIncremente_dep()
{
    for ($i = 100; $i < 999; $i++) {
        yield $i;
    }
}