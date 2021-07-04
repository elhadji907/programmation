<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Demandeur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'sexe' => $faker->word,
        'situation_professionnelle' => $faker->word,
        'etablissement' => $faker->word,
        'niveau_etude' => $faker->word,
        'diplome' => $faker->word,
        'qualification' => $faker->text,
        'experience' => $faker->text,
        'deja_forme' => $faker->word,
        'pre_requis' => $faker->text,
        'adresse' => $faker->text,
        'type' => $faker->word,
        'situation' => $faker->word,
        'telephone' => $faker->word,
        'fixe' => $faker->word,
        'nbre_piece' => $faker->randomNumber(),
        'statut' => $faker->word,
        'items1' => $faker->word,
        'items2' => $faker->word,
        'date_depot' => $faker->dateTime(),
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
        'file1' => $faker->word,
        'file2' => $faker->word,
        'file3' => $faker->word,
        'file4' => $faker->word,
        'file5' => $faker->word,
        'file6' => $faker->word,
        'file7' => $faker->word,
        'file8' => $faker->word,
        'file9' => $faker->word,
        'file10' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'lieux_id' => function () {
            return factory(App\Lieux::class)->create()->id;
        },
        'items_id' => function () {
            return factory(App\Item::class)->create()->id;
        },
        'projets_id' => function () {
            return factory(App\Projet::class)->create()->id;
        },
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
        'regions_id' => function () {
            return factory(App\Region::class)->create()->id;
        },
        'diplomes_id' => function () {
            return factory(App\Diplome::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremen_demandeur = autoIncremen_demandeur();

$factory->define(App\Demandeur::class, function (Faker\Generator $faker) use ($autoIncremen_demandeur) {
    $autoIncremen_demandeur->next();
    $annee = date('y');
    $role_id=App\Role::where('name','Demandeur')->first()->id;
    $projet_id=App\Projet::all()->random()->id;
    $programmes_id=App\Programme::all()->random()->id;
    $regions_id=App\Region::all()->random()->id;
    $lieux_id=App\Lieux::all()->random()->id;
    $diplomes_id=App\Diplome::all()->random()->id;

    
    $nombre = rand(1, 9);

    return [
        'numero' => $autoIncremen_demandeur->current()."".$annee,
        'situation_professionnelle' => SnmG::getSituation(),
        'etablissement' => SnmG::getEtablissement(),
        'niveau_etude' => SnmG::getNiveaux(),
        'diplome' => SnmG::getDiplome(),
        'qualification' => $faker->text,
        'experience' => $faker->text,
        'deja_forme' => SnmG::getDeja(),
        'pre_requis' => $faker->text,
        'adresse' => $faker->address,
        'type' => $faker->word,
        'situation' => SnmG::getSituation(),
        'telephone' => $faker->e164PhoneNumber,
        'fixe' => $faker->phoneNumber,
        'statut' => "Attente",
        'motivation' => $faker->paragraph(10),
        'nbre_piece' => $nombre,
        'date_depot' => $faker->dateTime(),
        'date1' => $faker->dateTime(),
        'date2' => $faker->dateTime(),
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'lieux_id' => function () use($lieux_id) {
            return $lieux_id;
        },
        'projets_id' => function ()  use($projet_id) {
            return $projet_id;
        },
        'programmes_id' => function ()  use($programmes_id) {
            return $programmes_id;
        },
        'regions_id' => function ()  use($regions_id) {
            return $regions_id;
        },
        'diplomes_id' => function ()  use($diplomes_id) {
            return $diplomes_id;
        },
    ];
});

function autoIncremen_demandeur()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}