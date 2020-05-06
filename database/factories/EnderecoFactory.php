<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Models\localizacao\Cidade;
use App\Models\endereco\Endereco;

$factory->define(Endereco::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
    $cidades = (array) Cidade::all();
    $key = array_rand($cidades);
    $cidade = $cidades[$key][array_rand($cidades[$key])];
    return [
        'endereco' => $faker->streetName,
        'numero' => $faker->buildingNumber,
        'bairro' => $faker->cityPrefix.' '. $faker->citySuffix,
        'id_cidade' => $cidade['id']
    ];
});
