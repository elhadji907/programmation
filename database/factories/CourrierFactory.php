<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
/*
use Faker\Generator as Faker;

$factory->define(App\Courrier::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'objet' => $faker->text,
        'expediteur' => $faker->word,
        'name' => $faker->name,
        'type' => $faker->word,
        'description' => $faker->text,
        'message' => $faker->text,
        'email' => $faker->safeEmail,
        'fax' => $faker->word,
        'bp' => $faker->word,
        'telephone' => $faker->word,
        'file' => $faker->word,
        'legende' => $faker->word,
        'statut' => $faker->word,
        'date' => $faker->dateTime(),
        'adresse' => $faker->word,
        'date_imp' => $faker->dateTime(),
        'date_recep' => $faker->dateTime(),
        'date_rejet' => $faker->dateTime(),
        'date_liq' => $faker->dateTime(),
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'types_courriers_id' => function () {
            return factory(App\TypesCourrier::class)->create()->id;
        },
    ];
});*/


use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\Courrier::class, function (Faker\Generator $faker) {
    $user_id=App\User::all()->random()->id;
    $gestionnaire_id=App\Gestionnaire::all()->random()->id;


    return [
        'numero' => Str::random(8),
        'objet' => $faker->sentence,
        'expediteur' => SnmG::getFirstName()." ".SnmG::getName(),
        'name' => $faker->name,
        'type' => $faker->word,
        'description' => $faker->text,
        'message' => $faker->paragraph(2),
        'email' => $faker->safeEmail,
        'fax' => $faker->tollFreePhoneNumber,
        'bp' => $faker->postcode,
        'telephone' => $faker->phoneNumber,
        'file' => $faker->word,
        'legende' => "",
        'statut' => "",
        'date' => $faker->dateTime(),
        'adresse' => $faker->address,
        'date_imp' => $faker->dateTime(),
        'date_recep' => $faker->dateTime(),
        'date_rejet' => $faker->dateTime(),
        'date_liq' => $faker->dateTime(),
        'gestionnaires_id' => function ()  use($gestionnaire_id) {
            return $gestionnaire_id;
        },
        'users_id' => function ()  use($user_id) {
            return $user_id;
        },
        /*
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'types_courriers_id' => function () {
            return factory(App\TypesCourrier::class)->create()->id;
        },
        */
    ];
});
