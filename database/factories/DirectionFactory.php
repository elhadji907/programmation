<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Direction::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'chef_id' => $faker->randomNumber(),
    ];
}); */


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Direction::class, function (Faker\Generator $faker) {
    $chef_id = App\Administrateur::all()->random()->id;

    return [
        'name' => SnmG::getDirection(),
        'sigle' => SnmG::getSigledirection(),
        'chef_id' => $chef_id,
    ];
});