<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Individuelle::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'cin' => $faker->word,
<<<<<<< HEAD
        'nbre_pieces' => $faker->randomNumber(),
        'legende' => $faker->text,
        'reference' => $faker->text,
        'experience' => $faker->text,
        'projet' => $faker->text,
        'prerequis' => $faker->text,
        'information' => $faker->text,
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        'items1' => $faker->word,
        'date1' => $faker->dateTime(),
        'demandeurs_id' => function () {
            return factory(App\Demandeur::class)->create()->id;
        },
    ];
});
