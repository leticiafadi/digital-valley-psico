<?php

namespace App\Http\Controllers\Dashboard;

use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consulta;
use App\Turno;

use App\Http\Controllers\Traits\DeletarConsulta;

class ConsultaController extends Controller
{
		private $hash;
	
		use DeletarConsulta;

	   public function __construct(){
			$this->hashVisualizar = new Hashids(config('hashIds.consultas.VISUALIZARCONSULTA'), 32);
			$this->hashExcluir = new Hashids(config('hashIds.consultas.DELETARCONSULTA'), 32);
			$this->middleware('funcionario');   
	   }
	
		public function mostarPaginaConsultas(){
			return view('auth.pages.consulta', ['consultas' => Consulta::orderBy('visualizado', 'asc')->orderBy('created_at', 'desc')->get(), 'hashVisualizar' => $this->hashVisualizar, 'hashDeletar' => $this->hashExcluir]);
		}
	
		public function verConsulta($id = 0){

			try{
				//Caso a o codigo da consulta seja invalido
				if(!$this->hashVisualizar->decode($id))
					return  redirect()->back();
				
				$consulta = Consulta::where('id', $this->hashVisualizar->decode($id)[0])->first();
				//Isso é temporário para marcar o pedido de atendimento como visualizado, depois tratar com as Traits.
				$consulta->visualizado = 1;
				$consulta->save();
				
				return view('auth.pages.item-consulta.item-consulta')->with('consulta', $consulta);
			}catch(Exception $e){
				return  $this->redirect()->back();
			}

		}
	
		public function deletarConsulta($id = 0){
			
			
			//Caso a o codigo da consulta seja invalido
			if(!$this->hashExcluir->decode($id))
				return  redirect()->back();

			
			$this->deleta($this->hashExcluir->decode($id));
			
			return redirect()->back();
		}
}
