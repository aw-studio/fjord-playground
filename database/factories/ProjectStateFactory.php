<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProjectState;
use Faker\Generator as Faker;

$factory->define(ProjectState::class, function (Faker $faker) {
    return [
        'title' => $faker->randomDigit
    ];
});
