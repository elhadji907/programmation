<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

<<<<<<< HEAD

/*
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
use Faker\Generator as Faker;

$factory->define(App\Administrateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
<<<<<<< HEAD
});
*/

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Administrateur::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Administrateur')->first()->id;
    return [
        'matricule' => "ADMIN".$faker->word,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
});
