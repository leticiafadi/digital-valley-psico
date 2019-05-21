<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Consulta;
use App\Turno;

trait DeletarConsulta{
	
	private function deleta($codigo = 0){		
		$consulta = Consulta::where('id', '=', $codigo)->get()->first();
		
		foreach(Turno::where("id_consulta", '=', $consulta->id)->get() as $turno)
			$this->deletaTurno($turno);
		
		$consulta->delete();
		
	}
	
	private function deletaTurno(Turno $turno){
		$turno->delete();
	}
	
}