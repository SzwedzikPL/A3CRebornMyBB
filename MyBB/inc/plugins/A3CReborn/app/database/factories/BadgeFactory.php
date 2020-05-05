<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Badge\Model\Badge;
use Faker\Generator as Faker;

$factory->define(Badge::class, function (Faker $faker) {
    return [
        'name' => $faker->words(rand(1,3), true),
        'color' => substr($faker->hexColor, 1),
        'badge_group_id' => factory(\App\Badge\Model\BadgeGroup::class),
    ];
});
