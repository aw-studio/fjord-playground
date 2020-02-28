<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProjectStatus;
use Faker\Generator as Faker;

$factory->define(ProjectStatus::class, function (Faker $faker) {
    return [
        'title' => $faker->randomDigit
    ];
});
