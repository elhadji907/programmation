<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Courrier::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'objet' => $faker->text,
        'name' => $faker->name,
        'types' => $faker->word,
        'description' => $faker->text,
        'fichier' => $faker->word,
        'statut' => $faker->word,
        'date' => $faker->dateTime(),
<<<<<<< HEAD
        'date_imp' => $faker->dateTime(),
        'date_recep' => $faker->dateTime(),
        'date_rejet' => $faker->dateTime(),
        'date_liq' => $faker->dateTime(),
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
<<<<<<< HEAD
        },
        'types_courriers_id' => function () {
            return factory(App\TypesCourrier::class)->create()->id;
=======
>>>>>>> 12def4e861499fc22429916071ae3b560bd211e6
        },
        'date_imp' => $faker->dateTime(),
        'date_recep' => $faker->dateTime(),
        'date_rejet' => $faker->dateTime(),
        'date_liq' => $faker->dateTime(),
    ];
});
