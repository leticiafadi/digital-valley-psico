<?php

namespace App\Http\Controllers\Traits;

use App\Models\horarios\Semana;
use App\Models\dataTempo\Data;
use App\Models\horarios\HorarioSemana;


trait SalvarSemana {

    private function manterSemana(  Semana  $semana,
                                    array   $dias, 
                                    int     $ano,
                                    int     $numeroSemana){

        $dia = Data::primeiraSegundaFeiraSemana($ano, $numeroSemana);
        $horario = 'a';

        foreach($dias['segunda'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

        $dia = date('Y-m-d', strtotime($dia. '+1 day'));
        $horario = 'a';

        foreach($dias['terca'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

        $dia = date('Y-m-d', strtotime($dia. '+1 day'));
        $horario = 'a';

        foreach($dias['quarta'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

        $dia = date('Y-m-d', strtotime($dia. '+1 day'));
        $horario = 'a';

        foreach($dias['quinta'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

        $dia = date('Y-m-d', strtotime($dia. '+1 day'));        
        $horario = 'a';

        foreach($dias['sexta'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

          $dia = date('Y-m-d', strtotime($dia. '+1 day'));        
        $horario = 'a';

        foreach($dias['sexta'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

          $dia = date('Y-m-d', strtotime($dia. '+1 day'));        
        $horario = 'a';

        foreach($dias['sexta'] as $key => $val) {
            if($val) {
                if(HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first() == null){
                    HorarioSemana::create([
                        'dia'       => $dia,
                        'horario'   => $horario,
                        'id_semana' => $semana->id
                    ]);
                }
            }else{
                $aux = HorarioSemana::where('dia',$dia)->where('horario', $horario)->where('id_semana', $semana->id)->first();
                if($aux != null){
                    $aux->delete();
                }
            }
            $horario++;
        }

        return $semana->horarios();

    }

}