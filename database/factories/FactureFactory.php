<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Facture::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_etablissement' => $faker->dateTime(),
        'details' => $faker->word,
        'montant1' => $faker->randomFloat(),
        'montant2' => $faker->randomFloat(),
        'autre_montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
    ];
});*/
use Faker\Generator as Faker;

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoI = autoI();

$factory->define(App\Facture::class, function (Faker $faker) use ($autoI)  {
    $annee = date('y');
    return [
        'numero' => 'EP'.$autoI->current()."".$annee,
        'date_etablissement' => $faker->dateTime(),
        'details' => $faker->word,
        'montant1' => $faker->randomDigit(),
        'montant2' => $faker->randomDigit(),
        'autre_montant' => $faker->randomDigit(),
        'total' => $faker->randomDigit(),
    ];
});

function autoI()
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