<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DummyData;
use Faker\Generator as Faker;

$factory->define(DummyData::class, function (Faker $faker) {

    $invoice = Factory(App\Invoice::class)->create();

    $items = Factory(App\Item::class, 2)
        ->create([
            'invoice_id' => $invoice->id
        ]);

    $total = 0;
    foreach ($items as $item) {
        $total += $item->line_total;
    }

    $invoice->total = $total;
    $invoice->save();

    return [
        null
    ];
});
