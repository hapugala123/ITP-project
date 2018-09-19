<?php

$factory->define(App\Purchase::class, function (Faker\Generator $faker) {
    return [
        "item_code" => $faker->name,
        "quantity" => $faker->randomNumber(2),
    ];
});
