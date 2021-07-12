<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\Findividuelle::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'code' => $faker->word,
        'categorie' => $faker->word,
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
}); */
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$autoIncremente_code_ind = autoIncremente_code_ind();

$factory->define(App\Findividuelle::class, function (Faker\Generator $faker) use ($autoIncremente_code_ind) {
    $autoIncremente_code_ind->next();
    $annee = date('y');
    
    $types_formation_id=App\TypesFormation::where('name','Individuelle')->first()->id;

    return [
        'code' => 'I'."".$annee.$autoIncremente_code_ind->current(),
        'categorie' => $faker->word,
        'formations_id' => function () use($types_formation_id) {
            return factory(App\Formation::class)->create(["types_formations_id"=>$types_formation_id])->id;
        },
    ];
});

function autoIncremente_code_ind()
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