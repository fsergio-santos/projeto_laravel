<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Editora;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Editora::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
