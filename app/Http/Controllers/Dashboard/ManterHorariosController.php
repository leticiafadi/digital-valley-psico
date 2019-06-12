<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\horarios\Semana;
use App\Models\funcionario\Funcionario;
use App\Models\dataTempo\Data;


class ManterHorariosController extends Controller{

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   
    }

    public function mostrarPaginaManterHorarios(){
        return view('auth.pages.manter-horarios.manter-horarios');
    }

    public function carregaDatas(Request $request){
        //pega a semana do banco de dados
        $semana = Semana::where('ano', $request->ano)->where('numero_semana', $request->semana)->where('id_funcionario', Funcionario::where('id_usuario', Auth::user()->id)->first()->id)->first();

        //se a semana ainda não existir
        if($semana == null){
            //verifica se uma nova semana pode ser criada.
            //Criei uma regra de negocio, o funcionario so pode agendar seu horarios 03 semanas posteriores a semana atual.
            if(date('W') < $request->semana && $request->semana <= ( date('W', strtotime( '+3 weeks') ) )){
                $arraySemana = [
                    'ano'               => $request->ano,
                    //o id do funcionario
                    'id_funcionario'    => Funcionario::where('id_usuario', Auth::user()->id)->first()->id,
                    'numero_semana'     => $request->semana,
                    //pega a primeira segundafeira daquela semana
                    'data_inicio'       => Data::primeiraSegundaFeiraSemana($request->ano, $request->semana)
                ];
                $semana = Semana::create($arraySemana);
                echo $semana;
            }else{
                echo '{}';
            }
        }else{
            $dias = [];
            for($i = 0; $i < 5; $i++ ){
                
            }

            echo json_encode($semana->horarios());
        }


       
    }

}
