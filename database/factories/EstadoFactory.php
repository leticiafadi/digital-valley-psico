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

use App\Models\localizacao\Pais;
use App\Models\localizacao\Estado;

$factory->define(Estado::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\pt_BR\Address($faker));
    $paises = (array) Pais::all();
    $key = array_rand($paises);
    $pais = $paises[$key][array_rand($paises[$key])];
    return [
        'name' => $faker->state,
        'country_id' => $pais['id']
    ];
});
