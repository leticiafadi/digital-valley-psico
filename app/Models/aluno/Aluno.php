<?php

namespace App\Models\aluno;

use App\Models\atendimento\Atendimento;
use Illuminate\Database\Eloquent\Model;
use App\Models\usuarios\Usuario;
use Illuminate\Support\Facades\DB;

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

    //busca so os alunos REFATORAR
    public static function buscaAlunos($data,$page){
        $aluno = DB::select(DB::raw('select usuario.nome_completo, usuario.id,aluno.matricula,aluno.id,curso.nome FROM aluno, usuario, curso where usuario.tipo = "aluno" and aluno.id_usuario = usuario.id  and curso.id = aluno.id_curso and usuario.nome_completo like "%'.$data.'%"'));
        $tamanho = Usuario::where('tipo','aluno')->where('nome_completo','like','%'.$data.'%')->get()->count();
        $data=[
            'alunos' => $aluno,
            'tamanho' => $tamanho
        ];
        return $data;
    }
    //busca alunos de acordo com o curso REFATORAR
    public static function buscaAlunosCurso($data,$page,$id_curso){
         $aluno = DB::select(DB::raw('select usuario.nome_completo, usuario.id,aluno.matricula,aluno.id,curso.nome FROM aluno, usuario, curso where usuario.tipo = "aluno" and aluno.id_usuario = usuario.id AND aluno.id_curso = '.$id_curso.' and curso.id ='.$id_curso.' and usuario.nome_completo like "%'.$data.'%"'));
         $tamanho = Usuario::where('tipo','aluno')->where('nome_completo','like','%'.$data.'%')->get()->count();
         $data=[
             'alunos' => $aluno,
             'tamanho' => $tamanho
         ];
         return $data;
     }

     public function usuario()
     {
         return $this->belongsTo(Usuario::class, 'id_usuario');
     }

}