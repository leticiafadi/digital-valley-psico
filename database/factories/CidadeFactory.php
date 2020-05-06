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
use App\Models\localizacao\Estado;

$factory->define(Cidade::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
    $estados = (array) Estado::all();
    $key = array_rand($estados);
    $estado = $estados[$key][array_rand($estados[$key])];
    return [
        'name' => $faker->city,
        'state_id' => $estado['id']
    ];
});
