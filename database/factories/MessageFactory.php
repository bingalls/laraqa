<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Message::class, static function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'sent' => $faker->boolean,
        'phone' => $faker->numberBetween(1000000000, 9999999999),
        'message' => Str::random(100),
    ];
});
