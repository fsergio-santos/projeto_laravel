<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    $gender = $faker->randomElements(['M', 'F'])[0];
    return [
        'nome' => $faker->name,
        'pseudonimo' => $faker->lastName,
        'data_nascimento'=> now(),
        'sexo' => $gender,
        'rg' => $faker->creditCardNumber,
        'cpf' => $faker->creditCardNumber ,
        'endereco' => $faker->streetAddress,
        'cep' => $faker->postcode,  
        'cidade' => $faker->city,
        'bairro' => $faker->city,
        'email' => $faker->email,
        'telefone_celular' => $faker->phoneNumber,
        'telefone_fixo' => $faker->phoneNumber,
    ];
});
