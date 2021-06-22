<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Collective::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
        'name' => $faker->name,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
        'sigle' => $faker->word,
        'statut' => $faker->word,
        'description' => $faker->text,
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Collective::class, function (Faker\Generator $faker) {
       
    $nombre1 = rand(1, 2);
    $nombre2 = rand(100, 999);
    $nombre3 = rand(1965, 1998);
    $nombre4 = rand(1, 9);
    $nombre5 = rand(0, 9);
    $nombre6 = rand(0, 9);
    $nombre7 = rand(0, 9);
    $nombre8 = rand(0, 9);
    $nombre9 = rand(0, 9);
    
    $cin = $nombre1.$nombre2.$nombre3.$nombre4.$nombre5.$nombre6.$nombre7.$nombre8.$nombre9;

    $nombre = rand(1, 9);
    return [
        'cin' => $cin,
        'name' => SnmG::getEtablissement(),
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function ()  {
            return factory(App\Demandeur::class)->create()->id;
        },
        'sigle' => $faker->word,
        'statut' => SnmG::getStatut(),
        'description' => $faker->text,
    ];
});