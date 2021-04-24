<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\comedies;
use Faker\Generator as Faker;

$factory->define(comedies::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'comedystart' => $faker->word,
        'comedyEnd' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
