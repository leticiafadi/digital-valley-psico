<?php

use Illuminate\Database\Seeder;
use App\Models\usuarios\Login;
use App\Models\usuarios\Usuario;

class LoginAlunoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = Usuario::where("tipo", 'aluno')->get()->toArray();

        $logins = array();
        foreach($usuarios as $chave => $usuario)
        {
            $logins[$chave]['id_usuario'] = $usuario['id'];
            $logins[$chave]['senha'] = bcrypt('senha1234');
        }
        Login::insert($logins);
    }
}
