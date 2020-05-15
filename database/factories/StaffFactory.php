<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use App\Models\Project;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'employee_id' => $faker->numberBetween($min = 0, $max = (Employee::count() - 1))
    ];
});
