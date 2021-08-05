<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

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
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Individuelle::class, function (Faker\Generator $faker) {
    
    $nombre1 = rand(1, 2);
    $nombre2 = rand(100, 999);
    $nombre3 = rand(1965, 1998);
    $nombre4 = rand(1, 9);
    $nombre5 = rand(0, 9);
    $nombre6 = rand(0, 9);
    $nombre7 = rand(0, 9);
    $nombre8 = rand(0, 9);
    $nombre9 = rand(0, 9);
    
    $types_demande_id=App\TypesDemande::where('name','Individuelle')->first()->id;
    
    $cin = $nombre1.$nombre2.$nombre3.$nombre4.$nombre5.$nombre6.$nombre7.$nombre8.$nombre9;

    $nombre = rand(1, 9);

    return [
        'cin' => $cin,
        'nbre_pieces' => $nombre,
        'legende' => $faker->text,
        'reference' => $faker->text,
        'experience' => $faker->text,
        'projet' => $faker->text,
        'prerequis' => $faker->text,
        'information' => $faker->text,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function ()  use($types_demande_id) {
            return factory(App\Demandeur::class)->create(["types_demandes_id"=>$types_demande_id])->id;
        },
    ];
});