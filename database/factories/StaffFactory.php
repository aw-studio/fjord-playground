<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'model_id' => $faker->numberBetween($min = 1, $max = 20),
        'model_type' => Project::class,
        'employee_id' => $faker->numberBetween($min = 1, $max = 200)
    ];
});
