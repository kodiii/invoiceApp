<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    $sku = $faker->numberBetween(100, 5000);
    $description = $faker->sentence(5);
    $quantity = $faker->numberBetween(1, 5);
    $price = $faker->randomFloat(2, 1, 20);
    $line_total = null;
    $invoice_id = Factory(App\Invoice::class);

    $sub_total = $quantity * $price;
    $line_total = $sub_total;  

    return [
        'sku' => $sku,
        'description' => $description,
        'quantity' => $quantity,
        'price' => $price,
        'line_total' =>  $line_total,
        'invoice_id' => $invoice_id,
    ];

});
