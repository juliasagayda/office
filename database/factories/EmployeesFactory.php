<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Employees::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date('Y-m-d'),
        'position' => $faker->jobTitle,
        'rate_hour' => $faker->boolean,
        'salary' => $faker->randomFloat(null, 100, 1500),
        'worked_hour' => $faker->randomFloat(null, 0, 200),
        'departments_id' => function () {
                return factory(App\Departments::class)->create()->id;
            },
    ];
});