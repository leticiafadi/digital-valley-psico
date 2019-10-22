<?php

namespace App\Models\horarios;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HorarioSemana extends Model{
    protected   $table = 'horario_semana';
    protected   $primaryKey = 'id';
    public      $timestamps = false;

    public static function create(array $data){
        $horario = new HorarioSemana();
        $horario->dia       = $data['dia'];
        $horario->horario   = $data['horario'];
        $horario->id_semana = $data['id_semana'];

        $horario->save();

        return $horario;
    }
   
}
