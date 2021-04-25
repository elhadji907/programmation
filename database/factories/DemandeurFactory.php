<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Demandeur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'sexe' => $faker->word,
        'situation_professionnelle' => $faker->word,
        'etablissement' => $faker->word,
        'niveau_etude' => $faker->word,
        'diplome' => $faker->word,
        'qualification' => $faker->text,
        'experience' => $faker->text,
        'deja_forme' => $faker->word,
        'pre_requis' => $faker->text,
        'adresse' => $faker->text,
        'type' => $faker->word,
        'projet' => $faker->text,
        'situation' => $faker->word,
        'telephone' => $faker->word,
        'fixe' => $faker->word,
        'items1' => $faker->word,
        'items2' => $faker->word,
        'items3' => $faker->word,
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'lieux_id' => function () {
            return factory(App\Lieux::class)->create()->id;
        },
        'items_id' => function () {
            return factory(App\Item::class)->create()->id;
        },
    ];
});
*/

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

$factory->define(App\Demandeur::class, function (Faker\Generator $faker) use (&$id) {
    $role_id=App\Role::where('name','Demandeur')->first()->id;
    $lieu_id = App\Lieux::all()->random()->id;

        return [
            'numero' => rand(2, $id++),
            'sexe' => SnmG::getSexe(),
            'situation_professionnelle' => SnmG::getSituation(),
            'etablissement' => $faker->city,
            'niveau_etude' => SnmG::getNiveaux(),
            'diplome' => SnmG::getDiplome(),
            'qualification' => $faker->text,
            'experience' => $faker->text,
            'deja_forme' => "",
            'pre_requis' => $faker->text,
            'adresse' => $faker->text,
            'type' => $faker->word,
            'projet' => $faker->paragraph(5),
            'situation' => "Attente",
            'telephone' => $faker->e164PhoneNumber,
            'fixe' => $faker->phoneNumber,
            'items1' => $faker->word,
            'items2' => $faker->word,
            'items3' => $faker->word,
            'date1' => $faker->dateTime(),
            'date2' => $faker->dateTime(),
            'users_id' => function () use($role_id) {
                return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
            },
            'lieux_id' => function () use($lieu_id){
                return $lieu_id;
            },
        ];
    });