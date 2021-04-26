<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Daf::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'description' => $faker->text,
        'designation' => $faker->text,
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'rejet' => $faker->text,
        'date_cg' => $faker->dateTime(),
        'retour' => $faker->word,
        'paye' => $faker->word,
        'observation' => $faker->text,
        'nb_pc' => $faker->word,
        'destinataire' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'num_bord' => $faker->word,
        'montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'autres_montant' => $faker->randomFloat(),
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'projets_id' => function () {
            return factory(App\Projet::class)->create()->id;
        },
        'imputations_id' => function () {
            return factory(App\Imputation::class)->create()->id;
        },
    ];
});*/


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncrem = autoIncrem();

$factory->define(App\Daf::class, function (Faker\Generator $faker) use ($autoIncrem) {
    $autoIncrem->next();

    $types_courrier_id=App\TypesCourrier::where('name','Courriers daf')->first()->id;
    $projet_id=App\Projet::get()->random()->id;
    $imputation_id=App\Imputation::get()->random()->id;
    $annee = date('y');
    $numero_courrier = date('His');

    return [
        'numero' => 'DA'.$autoIncrem->current()."".$annee,
        'name' => $faker->name,
        'description' => $faker->text,
        'designation' => $faker->text,
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'rejet' => $faker->text,
        'date_cg' => $faker->dateTime(),
        'retour' => $faker->word,
        'paye' => $faker->word,
        'observation' => $faker->text,
        'nb_pc' => $faker->word,
        'destinataire' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'num_bord' => $faker->word,
        'montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'autres_montant' => $faker->randomFloat(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
        'projets_id' => function () use($projet_id) {
            return $projet_id;
        },
        'imputations_id' => function () use($imputation_id) {
            return $imputation_id;
        },
    ];
});

function autoIncrem()
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