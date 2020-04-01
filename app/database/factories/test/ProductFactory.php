<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->randomNumber($nbDigits = 5, $strict = true),
        'description' => $faker->sentence(4),
        'stock' => $faker->randomNumber($nbDigits = 2, $strict = true),
        'cost' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 2),
    ];
});
