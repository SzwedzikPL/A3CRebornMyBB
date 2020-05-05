<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Badge\Model\BadgeGroup;
use Faker\Generator as Faker;

$factory->define(BadgeGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->words(rand(1,3), true),
        'description' => $faker->paragraph,
        'additional_data' => json_decode($faker->paragraph),
    ];
});
