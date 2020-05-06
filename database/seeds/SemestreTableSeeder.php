<?php

use App\Models\semestre\Semestre;
use Illuminate\Database\Seeder;

class SemestreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semestre::create([
            "ano" => "2020",
            "periodo" => '2'
        ]);
    }
}
