<?php

namespace App\Models\atendimento;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $table 	    = 'atendimento';
    protected $primaryKey 	= 'id';
    public $timestamps = false;

    public static function create(array $data){
        $atendimento = new Atendimento();
        $atendimento->id_aluno       = $data['id_aluno'];
        $atendimento->id_horario     = $data['id_horario'];
        $atendimento->id_psicologo   = $data['id_psicologo'];
        $atendimento->status         = $data['status'];
        $atendimento->motivo         = $data['motivo'];
        $atendimento->encaminhamento = $data['encaminhamento'];
        $atendimento->save();

        return $atendimento;
    }
}