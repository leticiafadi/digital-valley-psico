<?php

use App\Models\aluno\Aluno;
use App\Models\usuarios\ItemLogin;
use App\Models\usuarios\Usuario;
use App\Models\usuarios\Login;
use Illuminate\Database\Seeder;

class ItemLoginAlunoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alunos = Aluno::join('usuario', 'aluno.id_usuario', '=', 'usuario.id')
            ->join('login', 'login.id_usuario', '=', 'usuario.id')
            ->select('aluno.matricula', 'login.id as id_login')->get();

        $itemLogin = array();
        foreach ($alunos as $chave => $aluno){
            $itemLogin[$chave]['id_login'] = $aluno['id_login'];
            $itemLogin[$chave]['usuario'] = $aluno['matricula'];
        }

        ItemLogin::insert($itemLogin);
    }
}
