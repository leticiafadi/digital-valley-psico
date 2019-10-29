<?php

namespace App\Http\Controllers\Traits;

use App\Models\funcionario\Funcionario;
use App\Models\usuarios\Usuario;

trait BuscarFuncionario{

    private function listarPsicologos(){
        return Usuario::join('Funcionario','usuario.id','=','funcionario.id_usuario')->get();
    }

}