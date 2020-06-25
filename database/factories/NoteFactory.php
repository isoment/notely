<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'title' => Str::random(10),
        'note' => $faker->sentence
    ];
});