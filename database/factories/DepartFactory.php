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
});
 */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Depart::class, function (Faker\Generator $faker) {
    $types_courrier_id=App\TypesCourrier::where('name','Departs')->first()->id;
    return [
        'destinataire' => SnmG::getFirstName()." ".SnmG::getName(),
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});
