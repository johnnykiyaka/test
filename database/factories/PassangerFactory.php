<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Passanger;
use Faker\Generator as Faker;

$factory->define(Passanger::class, function (Faker $faker) {

    return [
        'movie' => $faker->word,
        'movieStart' => $faker->word,
        'movieEnds' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
