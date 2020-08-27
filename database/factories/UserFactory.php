<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

/* use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'civilite' => $faker->word,
        'firstname' => $faker->firstName,
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'telephone' => $faker->word,
        'date_naissance' => $faker->dateTime(),
        'lieu_naissance' => $faker->word,
        'situation_familiale' => $faker->word,
        'adresse' => $faker->address,
        'status' => $faker->word,
        'email_verified_at' => $faker->dateTime(),
        'password' => bcrypt($faker->password),
        'roles_id' => function () {
            return factory(App\Role::class)->create()->id;
        },
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
    ];
}); */

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

/* $id_user=App\User::get()->random()->id; */

/* $id_users = App\User::find($id_user);

$utilisateurs = $id_users->user;

$prenom = $utilisateurs->firstname;
$nom = $utilisateurs->name;
$username = $utilisateurs->username;

$created_by = $prenom.' '.$nom.' '.$username; */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'civilite' => SnmG::getCivilite(),
        'firstname' => SnmG::getFirstName(),
        'name' => SnmG::getName(),
        'username' => Str::random(7),
        'telephone' => $faker->phoneNumber,
        'date_naissance' => $faker->dateTime(),
        'lieu_naissance' => $faker->word,
        'situation_familiale' => $faker->word,
        'adresse' => $faker->address,
        'status' => "",
        'created_by' => SnmG::getFirstName().' '.SnmG::getFirstName().' ('.Str::random(7).')',
        'updated_by' => SnmG::getFirstName().' '.SnmG::getFirstName().' ('.Str::random(7).')',
        'email' => Str::random(5).".".$faker->safeEmail,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt('secret')
    ];
});
