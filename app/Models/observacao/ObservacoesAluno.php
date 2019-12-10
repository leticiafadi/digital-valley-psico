<?php

namespace App\Models\observacao;

use Illuminate\Database\Eloquent\Model;

class ObservacoesAluno extends Model
{
    protected $table      = 'observacoes_aluno';
    protected $primaryKey = 'id';
    public $timestamps    = false;

    public static function create(array $data){
        $observacoes_aluno = new Observacoes_aluno();
        $observacoes_aluno->id_aluno   = $data['id_aluno'];
        $observacoes_aluno->comentario = $data['comentario'];
        $observacoes_aluno->save();

        return $observacoes_aluno;
    }

}