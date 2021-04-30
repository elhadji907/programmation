<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'adresse' => $faker->word,
        'cin' => $faker->word,
        'fonction' => $faker->word,
        'date_embauche' => $faker->dateTime(),
        'classification' => $faker->word,
        'categorie_salaire' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'categories_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
    ];
});
