<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "role_id" => factory('App\Role')->create(),
        "remember_token" => $faker->name,
        "address" => $faker->name,
        "phone" => $faker->name,
        "bank_account_number" => $faker->name,
        "gender" => collect(["male","female",])->random(),
    ];
});
