<?php

use App\Models\funcionario\Funcionario;
use App\Models\usuarios\Usuario;
use Illuminate\Database\Seeder;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario = Usuario::where("tipo", 'funcionario')->first()->id;
        Funcionario::create([
            "siape" => '1234567',
            "cargo" => 'N/D',
            'crp' => '11/22112',
            'id_usuario' => $funcionario
        ]);
    }
}
