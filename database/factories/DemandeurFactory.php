<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Demandeur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'status' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'typedemandes_id' => function () {
            return factory(App\Typedemande::class)->create()->id;
        },
        'objets_id' => function () {
            return factory(App\Objet::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

$factory->define(App\Demandeur::class, function (Faker\Generator $faker) use (&$id) {
    $role_id=App\Role::where('name','Demandeur')->first()->id;
    $types_courrier_id=App\TypesCourrier::all()->random()->id;
    $typedemandes_id = App\Typedemande::all()->random()->id;
    $objets_id = App\Objet::all()->random()->id;
    $localites_id = App\Localite::all()->random()->id;
    $programmes_id = App\Programme::all()->random()->id;


    return [

        'numero_courrier' => rand(2, $id++),
        'numero' => $faker->word,
        'cin' => $faker->randomNumber($nbDigit=9),
        'experience' => $faker->word,
        'projet' => $faker->word,
        'information' => $faker->word,
        'date_depot' => $faker->dateTime(),
        'status' => "En attente",
        'note' => $faker->randomFloat(),

        'users_id' => function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'typedemandes_id'  => function () use($typedemandes_id) {
            return $typedemandes_id;
        },
        'objets_id' => function () use($objets_id) {
            return $objets_id;
        },
        'localites_id' => function () use($localites_id){
            return $localites_id;
        },
        'programmes_id' => function () use($programmes_id){
            return $programmes_id;
        },
    ];
});

