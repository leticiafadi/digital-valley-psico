<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\horarios\Semana;
use App\Models\funcionario\Funcionario;
use App\Models\dataTempo\Data;

use App\Http\Controllers\Traits\SalvarSemana;


class ManterHorariosController extends Controller{

    use salvarSemana;

    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   
    }

    public function mostrarPaginaManterHorarios(){
        return view('auth.pages.manter-horarios.manter-horarios');
    }

    public function carregarSemana($ano, $numeroSemana){
        //pega a semana do banco de dados
        $semana = Semana::where('ano', $ano)->where('numero_semana', $numeroSemana)->where('id_funcionario', Funcionario::where('id_usuario', Auth::user()->id)->first()->id)->first();

        //se a semana ainda não existir
        if($semana === null){
            //verifica se uma nova semana pode ser criada.
            //Criei uma regra de negocio, o funcionario so pode agendar seu horarios 03 semanas posteriores a semana atual.


            $semanaAtual = intval(date('W'));



            if($semanaAtual <= $numeroSemana && $numeroSemana <= $semanaAtual + 3 ){
                $arraySemana = [
                    'ano'               => $ano,
                    //o id do funcionario
                    'id_funcionario'    => Funcionario::where('id_usuario', Auth::user()->id)->first()->id,
                    'numero_semana'     => $numeroSemana,
                    //pega a primeira segundafeira daquela semana
                    'data_inicio'       => Data::primeiraSegundaFeiraSemana($ano, $numeroSemana)
                ];
                $semana = Semana::create($arraySemana);

                return response()->json(($semana->horarios()), 200);

            }else{
                return response()->json((["errors" => "Semana não encontrada."]), 404);
            }
        }else{
            return response()->json(($semana->horarios()));
        }

    }

    public function salvarSemana(Request $request, $ano, $numeroSemana) {
        $semana = Semana::where('ano', $ano)->where('numero_semana', $numeroSemana)->where('id_funcionario', Funcionario::where('id_usuario', Auth::user()->id)->first()->id)->first();

        $dias = $this->manterSemana($semana,
                                    $request->semana,
                                    $ano,
                                    $request->numeroSemana );
       
        return response()->json(($dias), 200);
    }


}
