<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Depart::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'destinataire' => $faker->word,
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Depart::class, function (Faker\Generator $faker) {
    $types_courrier_id=App\TypesCourrier::where('name','Departs')->first()->id;
    $annee = date('Y');
    $numero_courrier = date('His');

 /*    $nbr_courrier =  \App\Depart::get()->count();

    if ($nbr_courrier != '0') {       
        $courrier_id =  App\Depart::get()->last()->id;
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
    } */
    return [
        'numero' => 'CD-'.$annee."-".$numero_courrier,
        'destinataire' => SnmG::getFirstName()." ".SnmG::getName(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});