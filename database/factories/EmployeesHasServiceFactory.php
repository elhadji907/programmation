<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\EmployeesHasService::class, function (Faker $faker) {
    return [
        'services_id' => function () {
            return factory(App\Service::class)->create()->id;
        },
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
