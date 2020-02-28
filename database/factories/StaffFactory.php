<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'project_id' => $faker->numberBetween($min = 1, $max = 20),
        'employee_id' => $faker->numberBetween($min = 1, $max = 200)
    ];
});
