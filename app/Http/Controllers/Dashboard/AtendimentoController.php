<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\atendimento\Atendimento;
use App\Models\horarios\HorarioSemana;
use App\Models\horarios\Semana;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
{


    public static function mostrarAtendimentos(Request $request,$id){
        $atendimento = DB::select(DB::raw('SELECT atendimento.* FROM atendimento, horario_semana, semana WHERE atendimento.id_horario = horario_semana.id AND horario_semana.id_semana = semana.id AND semana.id_funcionario ="%'.$id.'%"'));
        return response($atendimento,200)->header('Content-Type','text/json');
    }

}
