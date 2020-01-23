<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Personnel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'debut' => $faker->dateTime(),
        'fin' => $faker->dateTime(),
        'nbrefant' => $faker->randomNumber(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
        'categories_id' => function () {
            return factory(App\Categorie::class)->create()->id;
        },
        'fonctions_id' => function () {
            return factory(App\Fonction::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Personnel::class, function (Faker\Generator $faker) {
    $role_id=App\Role::all()->random()->id;
    $directions_id = App\Direction::all()->random()->id;
    $categories_id = App\Categorie::all()->random()->id;
    $fonctions_id = App\Fonction::all()->random()->id;

    $letter1 = chr(rand(65,90));
    $letter2 = chr(rand(65,90));
    $letter3 = chr(rand(65,90));
    $letter4 = chr(rand(65,90));
    $nombre1 = rand(1000, 9999);
    $matricule = $letter1.$nombre1.$letter2.$letter3.'/'.$letter4;
    return [
        'matricule' => $matricule,
        'cin' => $faker->randomNumber($nbDigit=9),
        'debut' => $faker->dateTime(),
        'fin' => $faker->dateTime(),
        'nbrefant' => $faker->randomNumber($nbDigit=1),
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'directions_id' => function () use($directions_id) {
            return $directions_id;

        },
        'categories_id' => function () use($categories_id) {
            return $categories_id;

        },
        'fonctions_id' => function () use($fonctions_id) {
            return $fonctions_id;
        },
    ];
});
