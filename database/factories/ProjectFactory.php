<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\Models\Employee;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Project::class, function (Faker $faker) {
    $from = Carbon::parse(now())->addDays(mt_rand(1, 450));
    $until = Carbon::parse(now())->subDays(mt_rand(1, 100));

    return [
        'title' => $faker->company,
        'description' => $faker->text($maxNbChars = 200),
        'employee_id' => Employee::projectManagement()->inRandomOrder()->first()->id,
        'completion_date' => $faker->dateTimeBetween($until, $from, $timezone = null),
        'budget' => $faker->randomFloat($nbMaxDecimals = 2, $min = 5000, $max = 200000),
        'project_status_id' => $faker->numberBetween($min = 1, $max = 6),
    ];
});
