<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Departments::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->text(100),
    ];
});