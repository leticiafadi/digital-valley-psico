<?php

namespace App\Models\funcionario;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $hidden = [
    ];

    public static function create(array $data){
        $funcionario = new Funcionario();
        $funcionario->id_usuario    = $data['id_usuario'];
        $funcionario->siape          = $data['siape'];
        $funcionario->cargo         = $data['cargo'];
        $funcionario->crp            = $data['crp'];
        $funcionario->save();

        return $funcionario;
    }

    public function usuario(){
        return $this->hasOne('\App\Models\usuarios\Usuario', 'id', 'id_usuario');
    }


}
