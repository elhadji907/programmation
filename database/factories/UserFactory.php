<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/*
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'civilite' => $faker->word,
        'firstname' => $faker->firstName,
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'telephone' => $faker->word,
        'sexe' => $faker->word,
        'date_naissance' => $faker->dateTime(),
        'lieu_naissance' => $faker->word,
        'situation_familiale' => $faker->word,
        'email_verified_at' => $faker->dateTime(),
        'password' => bcrypt($faker->password),
        'created_by' => $faker->word,
        'updated_by' => $faker->word,
        'deleted_by' => $faker->word,
        'roles_id' => function () {
            return factory(App\Role::class)->create()->id;
        },
    ];
});
*/

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'civilite' => SnmG::getCivilite(),
        'firstname' => SnmG::getFirstName(),
        'name' => SnmG::getName(),
        'username' => Str::random(7),
        'email' => Str::random(5).".".$faker->safeEmail,
        'telephone' => $faker->phoneNumber,
        'sexe' => SnmG::getSexe(),
        'date_naissance' => $faker->dateTime(),
        'lieu_naissance' => SnmG::getLieunaissance(),
        'situation_familiale' => SnmG::getFamiliale(),
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt($faker->password),
        'created_by' => SnmG::getFirstName().' '.SnmG::getFirstName().' ('.Str::random(7).')',
        'updated_by' => SnmG::getFirstName().' '.SnmG::getFirstName().' ('.Str::random(7).')',
        'deleted_by' => "",
        /*'remember_token' => Str::random(10),
        'roles_id' => function () {
            return factory(App\Role::class)->create()->id;
        },*/
    ];
});