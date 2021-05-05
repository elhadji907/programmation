<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\EtatsPrevi::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_recep' => $faker->dateTime(),
        'designation' => $faker->text,
        'observation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'periode' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dag' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'dafs_id' => function () {
            return factory(App\Daf::class)->create()->id;
        },
    ];
});*/

use Faker\Generator as Faker;

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$aut = aut();

$factory->define(App\EtatsPrevi::class, function (Faker $faker) use ($aut) {
    $dafs_id=App\Daf::all()->random()->id;
    $annee = date('y');
    return [
        'numero' => 'PR'.$aut->current()."".$annee,
        'date_recep' => $faker->dateTime(),
        'designation' => $faker->text,
        'observation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'periode' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dag' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'dafs_id' => function ()  use($dafs_id) {
            return $dafs_id;
        },
    ];
});
function aut()
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