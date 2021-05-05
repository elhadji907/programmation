<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Banque::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'dafs_id' => function () {
            return factory(App\Daf::class)->create()->id;
        },
        'projets_id' => function () {
            return factory(App\Projet::class)->create()->id;
        },
    ];
});
*/

use Faker\Generator as Faker;

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$auto = auto();

$factory->define(App\Banque::class, function (Faker $faker) use ($auto) {
    
    $dafs_id=App\Daf::all()->random()->id;
    
    return [
        'dafs_id' => function ()  use($dafs_id) {
            return $dafs_id;
        },
    ];
});

function auto()
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