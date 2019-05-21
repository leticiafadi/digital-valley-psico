<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model{

	protected $table = 'consultas';
	protected $primaryKey = 'id';
	
	protected $hidden = [
		
	];
	
	public static function create($array = null){
		$consulta = new Consulta();
		$consulta->nome				 		= $array['nome'];
		$consulta->data_nascimento 	 		= $array['data_nascimento'];
		$consulta->naturalidade 	 		= $array['naturalidade'];
		$consulta->estado_civil  	 		= $array['estado_civil'];
		$consulta->filhos			 		= $array['filhos'];
		$consulta->endereco			 		= $array['endereco'];
		$consulta->email			 		= $array['email'];
		$consulta->reside_com		 		= $array['reside_com'];
		$consulta->reside_com_outros 		= $array['reside_com_outros'];
		$consulta->telefone_residencial 	= $array['telefone_residencial'];
		$consulta->telefone_celular 		= $array['telefone_celular'];
		$consulta->telefone_outros			= $array['telefone_outros'];
		$consulta->formacao_escolar 		= $array['formacao_escolar'];
		$consulta->curso_atual 				= $array['curso_atual'];
		$consulta->turno					= $array['turno'];
		$consulta->matricula				= $array['matricula'];
		$consulta->semestre					= $array['semestre'];
		$consulta->forma_ingresso 			= $array['forma_ingresso'];
		$consulta->tipo_cotas				= $array['tipo_cotas'];
		$consulta->semestre_ingresso		= $array['semestre_ingresso'];
		$consulta->cursos_concluidos		= $array['cursos_concluidos'];
		$consulta->cursos_em_andamento		= $array['cursos_em_andamento'];
		$consulta->auxilio					= $array['auxilio'];
		$consulta->tipo_auxilio				= $array['tipo_auxilio'];
		$consulta->periodo_auxilio			= $array['periodo_auxilio'];
		$consulta->bolsista					= $array['bolsista'];
		$consulta->tipo_bolsa				= $array['tipo_bolsa'];
		$consulta->periodo_bolsa			= $array['periodo_bolsa'];
		$consulta->outra_forma_de_condicao	= $array['outra_forma_de_condicao'];
		$consulta->periodo_outra_forma		= $array['periodo_outra_forma'];
		$consulta->encaminhado_por			= $array['encaminhado_por'];
		$consulta->outro_encaminhamento		= $array['outro_encaminhamento'];
		$consulta->motivo					= $array['motivo'];
		$consulta->observacoes_horarios		= $array['observacoes_horarios'];
		$consulta->visualizado				= 0;
		$consulta->save();
		
		return $consulta;
	}
	
	public function horarios(){
		return $this->hasMany('App\Turno', 'id_consulta', 'id')->orderBy('horario')->orderBy('dia');
	}
	
	
}
