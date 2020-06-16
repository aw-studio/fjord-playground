<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(100, 15000),
        'product' => $faker->randomElement([
            'shoe',
            'shirt',
            'jacket',
        ]),
        'created_at' => $faker->dateTimeBetween($startDate = '-60 days', $endDate = 'now')
    ];
});
