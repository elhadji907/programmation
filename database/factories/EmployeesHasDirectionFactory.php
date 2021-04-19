<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EmployeesHasDirection::class, function (Faker $faker) {
    return [
        'directions_id' => function () {
            return factory(App\Direction::class)->create()->id;
        },
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
