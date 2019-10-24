<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/* 
use Faker\Generator as Faker;

$factory->define(App\Beneficiaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'villages_id' => function () {
            return factory(App\Village::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Beneficiaire::class, function (Faker\Generator $faker) {
    $id_village=App\Village::get()->random()->id;
    $role_id=App\Role::where('name','Beneficiaire')->first()->id;
    return [
        'matricule' => "BENEF".$faker->word,
        'users_id' =>  function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'villages_id' => function () use($id_village) {
            return $id_village;
       },
    ];
}); 