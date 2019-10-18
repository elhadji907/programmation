<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Courrier::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'numero' => $faker->word,
//         'objet' => $faker->word,
//         'expediteur' => $faker->word,
//         'adresse' => $faker->word,
//         'fax' => $faker->word,
//         'bp' => $faker->word,
//         'type' => $faker->word,
//         'message' => $faker->word,
//         'imputation' => $faker->word,
//         'fichier' => $faker->word,
//         'statut' => $faker->word,
//         'date' => $faker->dateTime(),
//         'types_courriers_id' => function () {
//             return factory(App\TypesCourrier::class)->create()->id;
//         },
//         'gestionnaires_id' => function () {
//             return factory(App\Gestionnaire::class)->create()->id;
//         },
//     ];
// });

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Courrier::class, function (Faker\Generator $faker) {
    $gestionnaire_id=App\Gestionnaire::all()->random()->id;
    $annee = date('Y');
    return [
        
        'numero' => "SN-".$annee."-".$faker->randomNumber($nbDigit=5,$strict=true),
        'objet' => "Demande de ".$faker->name,
        'expediteur' => $faker->word,
        'adresse' => $faker->word,
        'fax' => $faker->word,
        'bp' => $faker->word,
        'type' => $faker->word,
        'message' => $faker->word,
        'imputation' => $faker->word,
        'fichier' => $faker->word,
        'statut' => $faker->word,
        'date' => $faker->dateTime(),
        'gestionnaires_id' => function () use($gestionnaire_id) {
            return $gestionnaire_id;
        },
    ];
});
