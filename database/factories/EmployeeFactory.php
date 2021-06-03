<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'adresse' => $faker->word,
        'cin' => $faker->word,
        'date_embauche' => $faker->dateTime(),
        'classification' => $faker->word,
        'categorie_salaire' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'categories_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'fonctions_id' => function () {
            return factory(App\Fonction::class)->create()->id;
        },
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Employee::class,  function (Faker\Generator $faker) {
    
    $role_id=App\Role::all()->random()->id;
    $directions_id = App\Direction::all()->random()->id;
    $categories_id = App\Category::all()->random()->id;
    $fonctions_id = App\Fonction::all()->random()->id;

    $letter = chr(rand(65,90));
    $nombre1 = rand(1, 9);
    $nombre2 = rand(0, 9);
    $nombre3 = rand(0, 9);
    $nombre4 = rand(0, 9);
    $nombre5 = rand(0, 9);
    $nombre6 = rand(0, 9);
    $matricule = $nombre1.$nombre2.$nombre3.$nombre4.$nombre5.$nombre6.'/'.$letter;

    return [
        'matricule' => $matricule,
        'adresse' => $faker->address,
        'cin' =>  $faker->randomNumber($nbDigit=9),
        'date_embauche' => $faker->dateTime(),
        'classification' => $faker->word,
        'categorie_salaire' => $faker->word,
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