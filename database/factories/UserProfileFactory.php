<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'user_handle' => '@'.$faker->unique()->word(),
        'bio' => $faker->sentence()
    ];
});
