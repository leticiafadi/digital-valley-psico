<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\atendimento\Atendimento;
use App\Turno;

use App\Http\Controllers\Traits\DeletarConsulta;

class ConsultaController extends Controller
{
		private $hash;
	
		use DeletarConsulta;

	   public function __construct(){
			// $this->hashVisualizar = new Hashids(config('hashIds.consultas.VISUALIZARCONSULTA'), 32);
			// $this->hashExcluir = new Hashids(config('hashIds.consultas.DELETARCONSULTA'), 32);
			$this->middleware('funcionario');   
	   }
	
		public function mostarPaginaConsultas(){
			// , ['consultas' => Consulta::orderBy('visualizado', 'asc')->orderBy('created_at', 'desc')->get(), 'hashVisualizar' => $this->hashVisualizar, 'hashDeletar' => $this->hashExcluir]
			return view('auth.pages.consulta');
		}

		public function listarAtendimentos(){
			$atendimentos = Atendimento::
			select("atendimento.id", "usuario.nome_completo as nome", "aluno.matricula", "atendimento.motivo", "atendimento.encaminhamento", 'horario_semana.horario', 'horario_semana.dia', 'atendimento.status')->
			where("id_psicologo", Auth::user()->id)->
			join("horario_semana", 'atendimento.id_horario', '=', 'horario_semana.id')->
			join('aluno', 'atendimento.id_psicologo', '=', 'aluno.id')->
			join('usuario', 'aluno.id_usuario', '=', 'usuario.id')->
			get();
			$horarios = [
				'a' => "08:00 as 09:00",
				'b' => "09:00 as 10:00",
				'c' => "10:00 as 11:00",
				'd' => "11:00 as 12:00",
				'e' => "13:00 as 14:00",
				'f' => "14:00 as 15:00",
				'g' => "15:00 as 16:00",
				'h' => "16:00 as 17:00",
				'i' => "17:00 as 18:00",
				'j' => "18:00 as 19:00",
			];
			foreach ($atendimentos as $atend)
				$atend->horario = $horarios[$atend->horario];
			return response($atendimentos, 200)->header('Content-Type', 'text/json');
		}
	
		public function verConsulta($id = 1){

			try{
				//Caso a o codigo da consulta seja invalido
				// if(!$this->hashVisualizar->decode($id))
				// 	return  redirect()->back();
				
				// $consulta = Consulta::first();
				//Isso é temporário para marcar o pedido de atendimento como visualizado, depois tratar com as Traits.
				// $consulta->visualizado = 1;
				// $consulta->save();
				
				return view('auth.pages.item-consulta.item-consulta')->with('consulta');
			}catch(\Exception $e){
				return  $this->redirect()->back();
			}

		}

    public function cancelarConsulta(Request $request)
    {
        $atendimento = Atendimento::find($request->atid);
        $psicologoId = Auth::id();

        if(($atendimento == null) OR ($atendimento->id_psicologo != $psicologoId))
        {
            //Atendimento não existe ou não pertece a esse psicologo
            return response()->json([
                'sucesso' => false,
                'code' => 404,
                'msg' => 'O atendimento selecionado não existe!',
            ], 404);
        }

        if ($atendimento->status == 'ocorrido' OR $atendimento->status == 'cancelado')
        {
            //Atendimento já ocorrido, não pode ser cancelado
            return response()->json([
                'sucesso' => false,
                'code' => 403,
                'msg' => 'Este atendimento não pode ser cancelado!',
            ], 403);
        }

        //Cancelar o atendimento
        $atendimento->status = 'cancelado';
        $atendimento->save();

        return response()->json([
            'sucesso' => true,
            'code' => 200,
            'msg' => 'Atendimento cancelado com sucesso!',
        ], 200);
    }
}
