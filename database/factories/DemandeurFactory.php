<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Demandeur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'status' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'typedemandes_id' => function () {
            return factory(App\Typedemande::class)->create()->id;
        },
        'objets_id' => function () {
            return factory(App\Objet::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

$factory->define(App\Demandeur::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Demandeur')->first()->id;
    $types_courrier_id=App\TypesCourrier::where('name','Demande')->first()->id;
    $typedemandes_id = App\Typedemande::all()->random()->id;
    $objets_id = App\Objet::all()->random()->id;
    $matricule = 'N'.date('YdmHis');
    $letter1 = chr(rand(65,90));
    $nombre1 = rand(1000, 9999);
    $matricule = $matricule.$letter1.$nombre1;
    $annee = date('Y');
    $nbr_courrier =  \App\Demandeur::get()->count();
    if ($nbr_courrier != '0') {       
        $courrier_id =  App\Demandeur::get()->last()->id;
    }else {
        $courrier_id = '0';
    }
        $longueur = strlen($courrier_id);
    if ($longueur <= '1' ) {
        $numero_courrier  = "000".$courrier_id;
    }
    elseif($longueur <= '2'){
        $numero_courrier  = "00".$courrier_id;
    }elseif($longueur <= '3') {
         $numero_courrier  = "0".$courrier_id;
    }else {
        $numero_courrier  = $courrier_id;
    }
    return [
        'matricule' => $matricule,
        'numero' => 'DF-'.$annee."-".$numero_courrier,
        'cin' => $faker->randomNumber($nbDigit=9),
        'status' => '',
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
        'users_id' => function () use($role_id) {
            return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'typedemandes_id'  => function () use($typedemandes_id) {
            return $typedemandes_id;
        },
        'objets_id' => function () use($objets_id) {
            return $objets_id;
        },
    ];
});

