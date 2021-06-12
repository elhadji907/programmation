<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Operateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero_agrement' => $faker->word,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'type_structure' => $faker->word,
        'ninea' => $faker->word,
        'rccm' => $faker->word,
        'quitus' => $faker->word,
        'telephone1' => $faker->word,
        'telephone2' => $faker->word,
        'fixe' => $faker->word,
        'email1' => $faker->word,
        'email2' => $faker->word,
        'adresse' => $faker->word,
        'communes_id' => function () {
            return factory(App\Commune::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'rccms_id' => function () {
            return factory(App\Rccm::class)->create()->id;
        },
        'nineas_id' => function () {
            return factory(App\Ninea::class)->create()->id;
        },
        'types_operateurs_id' => function () {
            return factory(App\TypesOperateur::class)->create()->id;
        },
        'quitus_id' => function () {
            return factory(App\Quitus::class)->create()->id;
        },
        'responsables_id' => function () {
            return factory(App\Responsable::class)->create()->id;
        },
        'specialites_id' => function () {
            return factory(App\Specialite::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
