<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName().' '.$faker->lastName(),
        'age'  =>  rand(18, 90),
        'address' => $faker->address,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
