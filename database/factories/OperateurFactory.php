<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

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
        'nom_responsable' => $faker->word,
        'qualification' => $faker->word,
        'prenom_responsable' => $faker->word,
        'cin_responsable' => $faker->word,
        'telephone_responsable' => $faker->word,
        'email_responsable' => $faker->word,
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
        'specialites_id' => function () {
            return factory(App\Specialite::class)->create()->id;
        },
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
        'departements_id' => function () {
            return factory(App\Departement::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;
$autoIncremente_op = autoIncremente_op();

$factory->define(App\Operateur::class, function (Faker\Generator $faker) use ($autoIncremente_op) {
    $autoIncremente_op->next();

    $annee = date('Y');
    $an = date('y');

    $role_id=App\Role::where('name','Operateur')->first()->id;
    $nineas_id=App\Ninea::all()->random()->id;
    $types_operateurs_id=App\TypesOperateur::all()->random()->id;
    $departements_id=App\Departement::all()->random()->id;
    $types_courrier_id=App\TypesCourrier::where('name','Operateur')->first()->id;

    $nombre1 = rand(1, 2);
    $nombre2 = rand(100, 999);
    $nombre3 = rand(1965, 1998);
    $nombre4 = rand(1, 9);
    $nombre5 = rand(0, 9);
    $nombre6 = rand(0, 9);
    $nombre7 = rand(0, 9);
    $nombre8 = rand(0, 9);
    $nombre9 = rand(0, 9);
    
    $cin = $nombre1.$nombre2.$nombre3.$nombre4.$nombre5.$nombre6.$nombre7.$nombre8.$nombre9;
    
    return [
        'numero_agrement' => $autoIncremente_op->current().".".$an."/ONFP/DG/DEC/".$annee,
        'name' => $faker->name,
        'sigle' => "",
        'type_structure' => $faker->word,
        'ninea' => $faker->word,
        'rccm' => $faker->word,
        'quitus' => $faker->word,
        'telephone1' => $faker->e164PhoneNumber,
        'telephone2' => $faker->e164PhoneNumber,
        'fixe' => $faker->word,
        'email1' => $faker->safeEmail,
        'email2' => $faker->safeEmail,
        'adresse' => $faker->address,
        'nom_responsable' => SnmG::getName(),
        'prenom_responsable' => SnmG::getFirstName(),
        'qualification' => $faker->word,
        'cin_responsable' => $cin,
        'telephone_responsable' => $faker->e164PhoneNumber,
        'email_responsable' => $faker->safeEmail,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
        'nineas_id' => function () use($nineas_id) {
            return $nineas_id;
        },        
        'types_operateurs_id' => function () use($types_operateurs_id) {
            return $types_operateurs_id;
        },
        'courriers_id' => function () use($types_courrier_id) {
            return factory(App\Courrier::class)->create(["types_courriers_id"=>$types_courrier_id])->id;
        },        
        'departements_id' => function () use($departements_id) {
            return $departements_id;
        },
    ];
});

function autoIncremente_op()
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