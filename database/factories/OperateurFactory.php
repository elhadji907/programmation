<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Operateur::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'matricule' => $faker->word,
//         'numero' => $faker->word,
//         'name' => $faker->name,
//         'ninea' => $faker->word,
//         'email' => $faker->safeEmail,
//         'telephone' => $faker->word,
//         'registre' => $faker->word,
//         'quitus' => $faker->word,
//         'status' => $faker->word,
//         'agreer' => $faker->word,
//         'date_debut' => $faker->dateTime(),
//         'date_fin' => $faker->dateTime(),
//         'users_id' => function () {
//             return factory(App\User::class)->create()->id;
//         },
//         'structures_id' => function () {
//             return factory(App\Structure::class)->create()->id;
//         },
//     ];
// });


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;


$factory->define(App\Operateur::class, function (Faker\Generator $faker) {
    
    $role_id=App\Role::where('name','Operateur')->first()->id;
    $structure_id=App\Structure::all()->random()->id;

    $annee = date('Y');


    return [
        'numero' => $faker->randomNumber($nbDigit=4).".".$faker->randomNumber($nbDigit=2)."/ONFP/DG/DEC/".$annee,
        'name' => $faker->sentence,
        'ninea' => $faker->word,
        'email' => $faker->safeEmail,
        'telephone' => $faker->phoneNumber,
        'registre' => $faker->word,
        'quitus' => $faker->word,
        'status' => $faker->word,
        'agreer' => $faker->word,
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'users_id' => function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
       },
        'structures_id' => function () use($structure_id) {
            return $structure_id;
        },
    ];
});
