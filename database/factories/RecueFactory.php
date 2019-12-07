<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Recue::class, function (Faker\Generator $faker) {
    $types_courrier_id=App\TypesCourrier::where('name','Arrives')->first()->id;

    return [
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },
    ];
});
