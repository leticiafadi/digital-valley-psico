<?php

use App\Models\usuarios\Usuario;
use App\Models\contato\Contato;
use Illuminate\Database\Seeder;

class ContatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario = Usuario::where("tipo", 'funcionario')->first()->id;
        $aluno = Usuario::where("tipo", 'aluno')->first()->id;
        foreach([
            ['(85) 9 9999-9999', 'telefone'],
            ['(85) 9 8888-8888', 'celular'],
            ['email@email.com', 'email']
            ] as $tipoContato){
            Contato::create([
                'contato' => $tipoContato[0],
                'id_usuario' => $funcionario,
                'tipo' => $tipoContato[1]
            ]);
            Contato::create([
                'contato' => $tipoContato[0],
                'id_usuario' => $aluno,
                'tipo' => $tipoContato[1]
            ]);
        }
    }
}
