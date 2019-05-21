<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consulta;
use App\Turno;


class ConsultaController extends Controller
{
		 public function __construct(){
			  $this->middleware('guest');
		 }
	
		public function cadastrarConsulta(Request $request){

			
			$date_aux = explode('/',$request['data_de_nascimento']);
			if(sizeof($date_aux) == 3 ){
				$request['data_nascimento'] = $date_aux[2].'-'.$date_aux[1].'-'.$date_aux[0];
			}else{
				return redirect('/')->withErrors(['data_de_nascimento' => ['A data informada é inválida']]);
			}

			$this->validate($request, [
				'nome' 						=> 'required|max:255',
				'data_nascimento'	 		=> 'required|date',
				'naturalidade'				=> 'required|max:64',
				'estado_civil'				=> 'required|max:15',
				'filhos'					=> 'required|in:sim,nao',
				'endereco'					=> 'required|max:127',
				'email'						=> 'required|email|max:127',
				'reside_com'				=> 'required|in:sozinho,familiares,amigos,parentes,outros',
				'reside_com_outros'			=> 'nullable|max:31',
				'telefone_residencial'		=> 'nullable|max:15',
				'telefone_celular'			=> 'required|max:15',
				'telefone_outros'			=> 'nullable|max:15',
				'formacao_escolar'			=> 'required|in:publica,privada,ambos',
				'curso_atual'				=> 'required|max:31',
				'turno'						=> 'required|max:15',
				'matricula'					=> 'required|digits:6|numeric',
				'semestre'					=> 'required|max:31',
				'forma_ingresso'			=> 'required|in:ampla,cotas',
				'tipo_cotas'				=> 'nullable|max:31',
				'semestre_ingresso'			=> 'required|max:15',
				'cursos_concluidos'			=> 'nullable|max:127',
				'cursos_em_andamento'		=> 'nullable|max:127',
				'auxilio'					=> 'required|in:0,1',
				'tipo_auxilio'				=> 'nullable|max:31',
				'periodo_auxilio'			=> 'nullable|max:31',
				'bolsista'					=> 'required|in:0,1',
				'tipo_bolsa'				=> 'nullable|max:31',
				'periodo_bolsa'				=> 'nullable|max:31',
				'outra_forma_de_condicao' 	=> 'nullable|max:31',
				'periodo_outra_forma'		=> 'nullable|max:31',
				'encaminhado_por'			=> 'required|in:professor,diretoria,expontaneo,outro',
				'outro_encaminhamento'		=> 'nullable|max:31',
				'motivo'					=> 'nullable|max:511',
				'captcha' 					=> 'required|captcha'
			]);
			
			$consulta = Consulta::create($request)['id'];
			
			if($request['turno1'])
				Turno::create('seg','a', $consulta);				
			if($request['turno2'])
				Turno::create('seg','b', $consulta);				
			if($request['turno3'])
				Turno::create('seg','c', $consulta);				
			if($request['turno4'])
				Turno::create('seg','d', $consulta);
			
			if($request['turno5'])
				Turno::create('ter','a', $consulta);				
			if($request['turno6'])
				Turno::create('ter','b', $consulta);				
			if($request['turno7'])
				Turno::create('ter','c', $consulta);				
			if($request['turno8'])
				Turno::create('ter','d', $consulta);
			
			if($request['turno9'])
				Turno::create('qua','a', $consulta);				
			if($request['turno10'])
				Turno::create('qua','b', $consulta);
			if($request['turno11'])
				Turno::create('qua','c', $consulta);
			if($request['turno12'])
				Turno::create('qua','d', $consulta);
			
			if($request['turno13'])
				Turno::create('qui','a', $consulta);				
			if($request['turno14'])
				Turno::create('qui','b', $consulta);
			if($request['turno15'])
				Turno::create('qui','c', $consulta);
			if($request['turno16'])
				Turno::create('qui','d', $consulta);
			
			if($request['turno17'])
				Turno::create('sex','a', $consulta);				
			if($request['turno18'])
				Turno::create('sex','b', $consulta);
			if($request['turno19'])
				Turno::create('sex','c', $consulta);
			if($request['turno20'])
				Turno::create('sex','d', $consulta);
			
				
			
			return redirect('/')->with('success', 'Seu atendimento com sucesso !!');
		}
}

