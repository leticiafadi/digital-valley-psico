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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\usuarios\Usuario::class, function (Faker\Generator $faker) {
    return [
        'nome_completo' => $faker->name,
        'id_endereco' => rand(1,15),
        'tipo' => 'aluno',
        'genero' => 'm',
        'data_nascimento' => '2020-01-01'
    ];
});
