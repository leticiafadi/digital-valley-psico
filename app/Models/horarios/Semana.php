<?php

namespace App\Models\horarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Semana extends Model{
    protected   $table = 'semana';
    protected   $primaryKey = 'id';
    public      $timestamps = false;

    public static function create(array $data){
        $semana = new Semana();
        $semana->ano            = $data['ano'];
        $semana->id_funcionario = $data['id_funcionario'];
        $semana->numero_semana  = $data['numero_semana'];
        $semana->data_inicio     = $data['data_inicio'];

        $semana->save();

        return $semana;
    }
    //retorna os horarios difponiveis daquela semana
    public function horarios(){
        $horarios = DB::select('SELECT horario_semana.dia, horario_semana.horario, horario_semana.id FROM horario_semana JOIN atendimento ON horario_semana.id <> atendimento.id_horario WHERE id_semana = ? ORDER BY dia, horario', [$this->id]);
        $retorno = [];
        $dia_auxiliar = $this->data_inicio;
        $aux = 0;
        for($i = 0; $i < 5; $i++){
            $dia = [];
            $horario = 97;
            for($j = 0; $j < 10; $j++){
                //se for o dia e o horario especificado
                if( $aux < sizeof($horarios) && $horarios[$aux]->dia == $dia_auxiliar && $horarios[$aux]->horario == chr($horario)){
                    array_push($dia, $horarios[$aux]->id);
                    $aux++;
                }else{
                    array_push($dia, 0);
                }
                $horario++;
            }
            array_push($retorno, ['dia' => $dia_auxiliar, 'horarios' => $dia]);
            $dia_auxiliar = date('Y-m-d', strtotime($dia_auxiliar.' +1 day'));
        }

        return $retorno;
    }
}
