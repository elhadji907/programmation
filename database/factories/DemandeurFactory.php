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

$factory->define(App\Demandeur::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Demandeur')->first()->id;
    $types_courrier_id=App\TypesCourrier::where('name','Demande')->first()->id;
    $typedemandes_id = App\Typedemande::all()->random()->id;
    $objets_id = App\Objet::all()->random()->id;
    $matricule = 'FP'.date('ymdHis');
    $letter1 = chr(rand(65,90));
    $matricule = $matricule.$letter1;
    return [
        'matricule' => $matricule,
        'cin' => $faker->word,
        'status' => '',
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
        'users_id' => function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'typedemandes_id'  => function () use($typedemandes_id) {
            return $typedemandes_id;
        },
        'objets_id' => function () use($objets_id) {
            return $objets_id;
        },
    ];
});

