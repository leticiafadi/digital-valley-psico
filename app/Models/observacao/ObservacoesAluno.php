<?php

namespace App\Models\observacao;

use Illuminate\Database\Eloquent\Model;

class ObservacoesAluno extends Model
{
    protected $table      = 'observacoes_aluno';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_aluno',
        'comentario',
        'created_at',
        'updated_at'
    ];
}