<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Permissao;
use Faker\Generator as Faker;

$factory->define(Permissao::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->catchPhrase,
    ];
});
