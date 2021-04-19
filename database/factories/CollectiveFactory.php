<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Collective::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
<<<<<<< HEAD
        'sigle' => $faker->word,
        'statut' => $faker->word,
        'projet' => $faker->text,
        'description' => $faker->text,
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
    ];
});
