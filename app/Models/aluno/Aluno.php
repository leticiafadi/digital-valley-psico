<?php

namespace App\Models\aluno;

use Illuminate\Database\Eloquent\Model;
use App\Models\usuarios\Usuario;

class Aluno extends Model
{
    protected $table 	    = 'aluno';
    protected $primaryKey 	= 'id';
    public $timestamps      = true;

    public static function create(array $data){
        $aluno = new Aluno();
        $aluno->matricula           = $data['matricula'];
        $aluno->semestre_matricula  = $data['semestre_matricula'];
        $aluno->id_curso            = $data['id_curso'];
        $aluno->id_usuario          = $data['id_usuario'];
        $aluno->save();

        return $aluno;
    }

    public static function buscaAlunos($data,$page){
        $aluno =  Usuario::where('tipo','aluno')->where('nome_completo','like','%'.$data.'%')->skip(10*$page)->take(10)->get();
        $tamanho = Usuario::where('tipo','aluno')->where('nome_completo','like','%'.$data.'%')->get()->count();
        $data=[
            'alunos' => $aluno,
            'tamanho' => $tamanho
        ];
        return $data;
    }


}