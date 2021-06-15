<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Direction::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'chef_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'types_directions_id' => function () {
            return factory(App\TypesDirection::class)->create()->id;
        },
    ];
});
 */

 use App\Helpers\SnNameGenerator as SnmG;
 use Illuminate\Support\Str;

$factory->define(App\Direction::class, function (Faker\Generator $faker) {

    $employees_id           = App\Employee::all()->random()->id;
    $types_directions_id    = App\TypesDirection::all()->random()->id;

    return [
        'name' => SnmG::getDirection(),
        'sigle' => "",
        'chef_id' => function ()use($employees_id) {
            return $employees_id;
        },
        'types_directions_id' => function ()use($types_directions_id) {
            return $types_directions_id;
        },
    ];
});