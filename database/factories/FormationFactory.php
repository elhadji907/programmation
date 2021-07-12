<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Formation::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'code' => $faker->word,
        'name' => $faker->name,
        'qualifications' => $faker->word,
        'effectif_total' => $faker->word,
        'date_pv' => $faker->dateTime(),
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'adresse' => $faker->word,
        'prevue_h' => $faker->randomNumber(),
        'prevue_f' => $faker->randomNumber(),
        'titre' => $faker->word,
        'attestation' => $faker->word,
        'forme_h' => $faker->randomNumber(),
        'forme_f' => $faker->randomNumber(),
        'total' => $faker->randomNumber(),
        'lieu' => $faker->word,
        'convention_col' => $faker->word,
        'decret' => $faker->word,
        'beneficiaires' => $faker->word,
        'ingenieurs_id' => function () {
            return factory(App\Ingenieur::class)->create()->id;
        },
        'agents_id' => function () {
            return factory(App\Agent::class)->create()->id;
        },
        'detfs_id' => function () {
            return factory(App\Detf::class)->create()->id;
        },
        'conventions_id' => function () {
            return factory(App\Convention::class)->create()->id;
        },
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'traitements_id' => function () {
            return factory(App\Traitement::class)->create()->id;
        },
        'niveauxs_id' => function () {
            return factory(App\Niveaux::class)->create()->id;
        },
        'specialites_id' => function () {
            return factory(App\Specialite::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'statuts_id' => function () {
            return factory(App\Statut::class)->create()->id;
        },
        'types_formations_id' => function () {
            return factory(App\TypesFormation::class)->create()->id;
        },
        'departements_id' => function () {
            return factory(App\Departement::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_code = autoIncremente_code();

$factory->define(App\Formation::class, function (Faker\Generator $faker) use ($autoIncremente_code) {
    $autoIncremente_code->next();
    $annee = date('y');

    $types_formations_id=App\TypesFormation::all()->random()->id;
    $departements_id=App\Departement::all()->random()->id;
    $ingenieurs_id=App\Ingenieur::all()->random()->id;

    return [
        'code' => 'FP'."".$annee.$autoIncremente_code->current(),
        'name' => $faker->company,
        'qualifications' => $faker->word,
        'effectif_total' => $faker->word,
        'date_pv' => $faker->dateTime(),
        'date_debut' => $faker->dateTimeBetween('-3 week', '+1 week'),
        'date_fin' => $faker->dateTimeBetween('-1 week', '+5 week'),
        'adresse' => $faker->address,
        'prevue_h' => $faker->randomNumber(),
        'prevue_f' => $faker->randomNumber(),
        'titre' => $faker->word,
        'attestation' => $faker->word,
        'forme_h' => $faker->randomNumber(),
        'forme_f' => $faker->randomNumber(),
        'total' => $faker->randomNumber(),
        'lieu' => $faker->word,
        'convention_col' => $faker->word,
        'decret' => $faker->word,
        'beneficiaires' => $faker->company,
        'ingenieurs_id' => function () use($ingenieurs_id) {
            return $ingenieurs_id;
        },
        /*'agents_id' => function () {
            return factory(App\Agent::class)->create()->id;
        },
        'detfs_id' => function () {
            return factory(App\Detf::class)->create()->id;
        },
        'conventions_id' => function () {
            return factory(App\Convention::class)->create()->id;
        },
        'programmes_id' => function () {
            return factory(App\Programme::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'traitements_id' => function () {
            return factory(App\Traitement::class)->create()->id;
        },
        'niveauxs_id' => function () {
            return factory(App\Niveaux::class)->create()->id;
        },
        'specialites_id' => function () {
            return factory(App\Specialite::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'statuts_id' => function () {
            return factory(App\Statut::class)->create()->id;
        },*/
        'types_formations_id' => function ()  use($types_formations_id) {
            return $types_formations_id;
        }, 
        'departements_id' => function () use($departements_id) {
            return $departements_id;
        },
    ];

});

    function autoIncremente_code()
{
    for ($i = 0; $i < 10000000; $i++) {
        $longueur = strlen($i);
        if ($longueur <= "1") {
            $i="0000".$i;
            yield $i;
        } elseif ($longueur >= 2 && $longueur < 3) {
            $i="000".$i;
            yield $i;
        }elseif ($longueur >= 3 && $longueur < 4) {
            $i="00".$i;
            yield $i;
        }elseif ($longueur >= 4 && $longueur < 5) {
            $i="00".$i;
            yield $i;
        }elseif ($longueur >= 5 && $longueur < 6) {
            $i="00".$i;
            yield $i;
        }elseif ($longueur >= 6 && $longueur < 7) {
            $i="0".$i;
            yield $i;
        }
        else {
            yield $i;
        }
    }
}