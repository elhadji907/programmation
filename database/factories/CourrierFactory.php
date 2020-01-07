<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Courrier::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'objet' => $faker->word,
//         'expediteur' => $faker->word,
//         'telephone' => $faker->word,
//         'email' => $faker->safeEmail,
//         'adresse' => $faker->word,
//         'fax' => $faker->word,
//         'bp' => $faker->word,
//         'type' => $faker->word,
//         'message' => $faker->word,
//         'legende' => $faker->word,
//         'file' => $faker->word,
//         'statut' => $faker->word,
//         'date_c' => $faker->dateTime(),
//         'date_r' => $faker->dateTime(),
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
    $objet = App\Objet::all()->random()->name;
  
    return [        
        'objet' => $objet,
        'expediteur' => SnmG::getFirstName()." ".SnmG::getName(),
        'adresse' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->email,
        'fax' => $faker->tollFreePhoneNumber,
        'bp' => $faker->postcode,
        'type' => $faker->word,
        'message' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'legende' => "",
        'file' => "",
        'statut' => $faker->word,
        'date_c' => $faker->dateTime(),
        'date_r' => $faker->dateTime(),
        'gestionnaires_id' => function () use($gestionnaire_id) {
            return $gestionnaire_id;
        },
    ];
});