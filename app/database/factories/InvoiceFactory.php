<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {

    static $number = 105;

    return [
        'number' => $number++,
        'total' =>  0,
        'start_date' => $faker->date('2020-03-25'),
        'end_date' =>  $faker->date('2020-04-02'),
        'invoice_client_id' => factory(App\Client::class),
        'invoice_status_id' => 2
    ];
});
