<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(20),
        'release_date'  =>  $faker->dateTimeBetween('-65 years', 'now - 18 years'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
