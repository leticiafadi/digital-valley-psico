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
$factory->define(\App\Models\aluno\Aluno::class, function (Faker\Generator $faker) {
    return [
        'matricula' => rand(111111,999999),
        'semestre_matricula' => '2018.1',
        'id_curso' => rand(1,5),
        'id_usuario' => factory(\App\Models\usuarios\Usuario::class)->create()->id,
    ];
});
