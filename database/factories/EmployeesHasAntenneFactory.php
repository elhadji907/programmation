<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EmployeesHasAntenne::class, function (Faker $faker) {
    return [
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'antennes_id' => function () {
            return factory(App\Antenne::class)->create()->id;
        },
    ];
});
