<?php

namespace App\Models\aluno;

use Illuminate\Database\Eloquent\Model;

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


}
