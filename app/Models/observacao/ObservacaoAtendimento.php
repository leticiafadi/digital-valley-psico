<?php

namespace App\Models\observacao;

use Illuminate\Database\Eloquent\Model;

class ObservacaoAtendimento extends Model
{
    protected $table      = 'observacao_atendimento';
    protected $primaryKey = 'id';
    protected $fillable = ['id_atendimento', 'observacao'];
}