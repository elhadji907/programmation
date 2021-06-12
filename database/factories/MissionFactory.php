<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Mission::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'localites' => $faker->word,
        'distance' => $faker->randomNumber(),
        'jours' => $faker->randomNumber(),
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'rejet' => $faker->text,
        'date_cg' => $faker->dateTime(),
        'retour' => $faker->word,
        'paye' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'date_depart' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'destination' => $faker->word,
        'montant' => $faker->randomFloat(),
        'reliquat' => $faker->randomFloat(),
        'accompt' => $faker->randomFloat(),
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'vehicules_id' => function () {
            return factory(App\Vehicule::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_mis = autoIncremente_mis();

$factory->define(App\Mission::class, function (Faker\Generator $faker) use ($autoIncremente_mis) {
    $autoIncremente_mis->next();

    $types_courrier_id=App\TypesCourrier::where('name','Missions')->first()->id;
    $annee = date('y');
    $numero_courrier = date('His');
    
    return [
        'numero' => 'MI'.$autoIncremente_mis->current()."".$annee,
        'localites' => $faker->word,
        'distance' => $faker->randomNumber(),
        'jours' => $faker->randomNumber(),
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'rejet' => $faker->text,
        'date_cg' => $faker->dateTime(),
        'retour' => $faker->word,
        'paye' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'date_depart' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'destination' => $faker->word,
        'montant' => $faker->randomFloat(),
        'reliquat' => $faker->randomFloat(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});

function autoIncremente_mis()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}