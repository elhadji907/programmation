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
        'status' => "",
        'email' => Str::random(5).".".$faker->safeEmail,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt('secret')
    ];
});
