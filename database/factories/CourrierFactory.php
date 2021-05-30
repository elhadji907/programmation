<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

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
        'date_cores' => $faker->dateTime(),
        'date_rejet' => $faker->dateTime(),
        'date_liq' => $faker->dateTime(),
        'designation' => $faker->text,
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'nb_pc' => $faker->word,
        'destinataire' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'num_bord' => $faker->randomNumber(),
        'montant' => $faker->randomFloat(),
        'autres_montant' => $faker->randomFloat(),
        'total' => $faker->randomFloat(),
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'types_courriers_id' => function () {
            return factory(App\TypesCourrier::class)->create()->id;
        },
        'projets_id' => function () {
            return factory(App\Projet::class)->create()->id;
        },
        'traitementcourriers_id' => function () {
            return factory(App\Traitementcourrier::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncre = autoIncre();

$factory->define(App\Courrier::class, function (Faker\Generator $faker) use ($autoIncre) {
    $autoIncre->next();

    $user_id=App\User::all()->random()->id;
    $projet_id=App\Projet::all()->random()->id;
    $annee = date('y');
    $numero_courrier = date('His');

    $montant = $faker->randomFloat();
    $autre_montant = $faker->randomFloat();

    $total = $montant + $autre_montant;


    return [
        'numero' => $autoIncre->current()."".$annee,
        'objet' => $faker->paragraph(1),
        'expediteur' => SnmG::getFirstName()." ".SnmG::getName(),
        'name' => $faker->name,
        'type' => $faker->word,
        'description' => $faker->text,
        'message' => $faker->paragraph(2),
        'email' => $faker->safeEmail,
        'fax' => $faker->tollFreePhoneNumber,
        'bp' => $faker->postcode,
        'telephone' => $faker->phoneNumber,
        'file' => "",
        'legende' => "",
        'statut' => "",
        'date' => $faker->dateTime(),
        'adresse' => $faker->address,
        'date_imp' => $faker->dateTime(),
        'date_recep' => $faker->dateTime(),
        'date_cores' => $faker->dateTime(),
        'date_rejet' => $faker->dateTime(),
        'date_liq' => $faker->dateTime(),
        'designation' => $faker->text,
        'date_visa' => $faker->dateTime(),
        'date_mandat' => $faker->dateTime(),
        'tva_ir' => $faker->word,
        'nb_pc' => $faker->word,
        'destinataire' => $faker->word,
        'date_paye' => $faker->dateTime(),
        'num_bord' => $faker->randomNumber(),
        'montant' => $montant,
        'autres_montant' => $autre_montant,
        'total' => $total,
        'projets_id' => function ()  use($projet_id) {
            return $projet_id;
       },
        'users_id' => function ()  use($user_id) {
            return $user_id;
        },
    ];
});

function autoIncre()
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