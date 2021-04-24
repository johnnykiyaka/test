<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\peoples;
use Faker\Generator as Faker;

$factory->define(peoples::class, function (Faker $faker) {

    return [
        'name' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
