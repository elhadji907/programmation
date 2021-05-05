<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\OrdresMission::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_recep' => $faker->dateTime(),
        'beneficiaire' => $faker->word,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dag' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'dafs_id' => function () {
            return factory(App\Daf::class)->create()->id;
        },
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
*/

use Faker\Generator as Faker;

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoInc = autoInc();

$factory->define(App\OrdresMission::class, function (Faker $faker)  use ($autoInc) {

    $dafs_id=App\Daf::all()->random()->id;
    $annee = date('y');

    return [
        'numero' => 'OM'.$autoInc->current()."".$annee,
        'date_recep' => $faker->dateTime(),
        'beneficiaire' => $faker->word,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dag' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'dafs_id' => function ()  use($dafs_id) {
            return $dafs_id;
        },
    ];
});

function autoInc()
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