<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Nivaux::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
    ];
});
 */

use Faker\Generator as Faker;

$factory->define(App\Nivaux::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
    ];
});