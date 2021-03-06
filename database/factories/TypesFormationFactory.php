<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\TypesFormation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'categorie' => $faker->word,
    ];
});
