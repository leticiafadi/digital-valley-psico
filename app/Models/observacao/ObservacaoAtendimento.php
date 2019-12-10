<?php

namespace App\Models\observacao;

use Illuminate\Database\Eloquent\Model;

class ObservacaoAtendimento extends Model
{
    protected $table      = 'observacao_atendimento';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function create(array $data){
        $obversacao_atendimento = new Observacao_atendimento();
        $obversacao_atendimento->id_atendimento = $data['id_atendimento'];
        $obversacao_atendimento->observacao     = $data['observacao'];
        $obversacao_atendimento->save();

        return $obversacao_atendimento;
    }

}