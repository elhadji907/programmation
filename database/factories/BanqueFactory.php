<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Banque::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'numero' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_bq = autoIncremente_bq();

$factory->define(App\Banque::class, function (Faker\Generator $faker) use ($autoIncremente_bq) {
    $autoIncremente_bq->next();

    $types_courrier_id=App\TypesCourrier::where('name','Banques')->first()->id;
    $annee = date('y');
    $numero_courrier = date('His');
    
    return [
        'numero' => 'BQ'.$autoIncremente_bq->current()."".$annee,
        'name' => $faker->name,
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});

function autoIncremente_bq()
{
    for ($i = 0; $i < 100000; $i++) {
        yield $i;
    }
}