<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\frightgo;
use Faker\Generator as Faker;

$factory->define(frightgo::class, function (Faker $faker) {

    return [
        'movie' => $faker->word,
        'movie' => $faker->word,
        'movie' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
