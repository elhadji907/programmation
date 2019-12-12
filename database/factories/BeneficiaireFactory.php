<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

// $factory->define(App\Beneficiaire::class, function (Faker $faker) {
//     return [
//         'uuid' => $faker->uuid,
//         'users_id' => function () {
//             return factory(App\User::class)->create()->id;
//         },
//         'villages_id' => function () {
//             return factory(App\Village::class)->create()->id;
//         },
//         'nivauxs_id' => function () {
//             return factory(App\Nivaux::class)->create()->id;
//         },
//         'diplomes_id' => function () {
//             return factory(App\Diplome::class)->create()->id;
//         },
//         'situations_id' => function () {
//             return factory(App\Situation::class)->create()->id;
//         },
//         'demandeurs_id' => function () {
//             return factory(App\Demandeur::class)->create()->id;
//         },
//     ];
// });

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Beneficiaire::class, function (Faker\Generator $faker) {
    $id_village=App\Village::get()->random()->id;
    $role_id=App\Role::where('name','Beneficiaire')->first()->id;
    $id_nivaux=App\Nivaux::get()->random()->id;
    $diplomes_id=App\Diplome::get()->random()->id;
    $situations_id=App\Situation::get()->random()->id;
    $demandeurs_id=App\Demandeur::get()->random()->id;
    return [
        'users_id' =>  function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'villages_id' => function () use($id_village) {
            return $id_village;
       },
        'nivauxs_id' => function () use($id_nivaux) {
            return $id_nivaux;
       },
       'diplomes_id' => function () use($diplomes_id) {
        return $diplomes_id;
        },
        'situations_id' => function () use($situations_id) {
            return $situations_id;
       },
        'demandeurs_id'  => function () use($demandeurs_id) {
            return $demandeurs_id;
        },
    ];
}); 