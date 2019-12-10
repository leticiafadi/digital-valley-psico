<?php

namespace App\Models\observacao;

use Illuminate\Database\Eloquent\Model;

class ObservacoesAluno extends Model
{
    protected $table      = 'observacoes_aluno';
    protected $primaryKey = 'id';
    public $timestamps    = false;

    public static function create(array $data){
        $observacoesAluno = new ObservacoesAluno();
        $observacoesAluno->id_aluno   = $data['id_aluno'];
        $observacoesAluno->comentario = $data['comentario'];
        $observacoesAluno->save();

        return $observacoesAluno;
    }

}