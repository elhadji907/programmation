<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Recue::class, function (Faker $faker) {
    return [
        'numero' => $faker->word,
        'uuid' => $faker->uuid,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncrement = autoIncrement();

$factory->define(App\Recue::class, function (Faker\Generator $faker) use ($autoIncrement) {
    $autoIncrement->next();

    $types_courrier_id=App\TypesCourrier::where('name','Courriers arrives')->first()->id;
    $annee = date('y');
    $numero_courrier = date('His');

    return [
        'numero' => 'CA'.$autoIncrement->current()."".$annee,
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});
function autoIncrement()
{
    for ($i = 0; $i < 100000; $i++) {
        if (strlen($i) <= 1) {
            yield '0000'.$i;
        } elseif (strlen($i) > 1 && strlen($i) <= 2) {
            yield '000'.$i;
        } elseif(strlen($i) > 2 && strlen($i) <= 3) {
            yield '00'.$i;
        } elseif(strlen($i) > 3 && strlen($i) <= 4) {
            yield '0'.$i;
        } else{
            yield $i;
        }
    }
}