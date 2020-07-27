<?php

namespace App\Models\observacao;

use Illuminate\Database\Eloquent\Model;

class ObservacaoAtendimento extends Model
{
    protected $table      = 'observacao_atendimento';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function create(array $data){
        $obversacaoAtendimento = new ObservacaoAtendimento();
        $obversacaoAtendimento->id_atendimento = $data['id_atendimento'];
        $obversacaoAtendimento->observacao     = $data['observacao'];
        $obversacaoAtendimento->save();

        return $obversacaoAtendimento;
    }

}