<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;
use Faker\Provider\Payment;

$factory->define(Author::class, function (Faker $faker) {

    $gender = $faker->randomElement(['M', 'F']);

    return [
        'nome' => $faker->name,
        'pseudonimo'=> $faker->name,
        'data_nascimento'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'sexo'=> $gender,
        'rg'=> $faker->creditCardNumber,
        'cpf'=> $faker->creditCardNumber,
        'endereco'=> $faker->streetAddress,
        'cep' => $faker->postcode,
        'cidade'=> $faker->city,
        'bairro' => $faker->name,
        'email' => $faker->email,
        'telefone_celular'=> $faker->tollFreePhoneNumber,
        'telefone_fixo'=> $faker->tollFreePhoneNumber,
    ];
});
