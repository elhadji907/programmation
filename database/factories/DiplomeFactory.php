<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Diplome::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'autre' => $faker->word,
        'options_id' => function () {
            return factory(App\Option::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;


$factory->define(App\Diplome::class, function (Faker\Generator $faker) {
    $options_id=App\Option::get()->random()->id;
    return [
        'name' => SnmG::getDiplome(),
        'autre' => "",
        'options_id' => function ()  use($options_id) {
            return $options_id;
        },
    ];
});
