<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Editora;
use Faker\Generator as Faker;

$factory->define(Editora::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
