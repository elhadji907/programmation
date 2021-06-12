<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\EtatsPrevi::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date_recep' => $faker->dateTime(),
        'designation' => $faker->text,
        'observation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'periode' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dg' => $faker->dateTime(),
        'date_cg' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_previs = autoIncremente_previs();

$factory->define(App\EtatsPrevi::class, function (Faker\Generator $faker) use ($autoIncremente_previs) {
    $autoIncremente_previs->next();

    $types_courrier_id=App\TypesCourrier::where('name','Etats previs')->first()->id;
    $annee = date('y');
    $numero_courrier = date('His');
    
    return [
        'numero' => 'CD'.$autoIncremente_previs->current()."".$annee,
        'date_recep' => $faker->dateTime(),
        'designation' => $faker->text,
        'observation' => $faker->text,
        'montant' => $faker->randomFloat(),
        'date_depart' => $faker->dateTime(),
        'periode' => $faker->dateTime(),
        'date_retour' => $faker->dateTime(),
        'date_transmission' => $faker->dateTime(),
        'date_dg' => $faker->dateTime(),
        'date_cg' => $faker->dateTime(),
        'date_ac' => $faker->dateTime(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});

function autoIncremente_previs()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}