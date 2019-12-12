<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Demandeur::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Demandeur')->first()->id;
    $types_courrier_id=App\TypesCourrier::where('name','Demande')->first()->id;
    return [
        'matricule' => 'DEM'.$faker->word,
        'cin' => $faker->word,
        'status' => '','courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
        'users_id' => function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'typedemandes_id' => function () {
            return factory(App\Typedemande::class)->create()->id;
        },
    ];
});
