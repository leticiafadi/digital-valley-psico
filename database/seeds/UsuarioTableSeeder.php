<?php

use App\Models\usuarios\Usuario;
use App\Models\endereco\Endereco;
use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecos = (array) Endereco::all();
        $key = array_rand($enderecos);
        $endereco = $enderecos[$key][array_rand($enderecos[$key])];
        Usuario::create([
            "nome_completo" => "Usuario",
            "data_nascimento" => '2000-01-01',
            "genero" => 'm',
            "tipo" => 'funcionario',
            'id_endereco' => $endereco['id']
        ]);
    }
}
