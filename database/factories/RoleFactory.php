<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
 */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;


$factory->define(App\Role::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
