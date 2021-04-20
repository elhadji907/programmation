<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Individuelle::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
        'nbre_pieces' => $faker->randomNumber(),
        'legende' => $faker->text,
        'reference' => $faker->text,
        'experience' => $faker->text,
        'projet' => $faker->text,
        'prerequis' => $faker->text,
        'information' => $faker->text,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
*/

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

use Faker\Provider\Barcode;

$factory->define(App\Individuelle::class, function (Faker\Generator $faker) use (&$id) {
    $role_id=App\Role::where('name','Demandeur')->first()->id;

    return [
        'cin' => rand(1, 2).''.$faker->ean13,
        'nbre_pieces' => $faker->randomNumber(),
        'legende' => "",
        'reference' => "",
        'experience' => $faker->text,
        'projet' => $faker->text,
        'prerequis' => $faker->text,
        'information' => $faker->text,
        'items1' => "",
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function () use($role_id) {
            return factory(App\Demandeur::class)->create(["users_id"=>$role_id])->id;
        },
    ];
});