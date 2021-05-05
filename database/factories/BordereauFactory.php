<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Bordereau::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'numero_mandat' => $faker->randomNumber(),
        'dafs_id' => function () {
            return factory(App\Daf::class)->create()->id;
        },
        'date_mandat' => $faker->dateTime(),
        'designation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'nombre_de_piece' => $faker->randomNumber(),
        'observation' => $faker->text,
    ];
});
*/

use Faker\Generator as Faker;

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncr = autoIncr();


$factory->define(App\Bordereau::class, function (Faker $faker) use ($autoIncr) {

    $dafs_id=App\Daf::all()->random()->id;
    $annee = date('y');

    return [
        'numero' => 'B'.$autoIncr->current()."".$annee,
        'numero_mandat' => $faker->randomNumber(),
        'dafs_id' => function ()  use($dafs_id) {
            return $dafs_id;
        },
        'date_mandat' => $faker->dateTime(),
        'designation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'nombre_de_piece' => $faker->randomNumber(),
        'observation' => $faker->text,
    ];
});

function autoIncr()
{
    for ($i = 0; $i < 100000; $i++) {
        if (strlen($i) <= 1) {
            yield '0000'.$i;
        } elseif (strlen($i) > 1 && strlen($i) <= 2) {
            yield '000'.$i;
        } elseif(strlen($i) > 2 && strlen($i) <= 3) {
            yield '00'.$i;
        } elseif(strlen($i) > 3 && strlen($i) <= 4) {
            yield '0'.$i;
        } else{
            yield $i;
        }
    }
}