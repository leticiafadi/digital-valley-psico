<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Turno extends Model
{
	
	protected $primaryKey 	= 'id';
	protected $table 		= 'turnos';
		
	public $timestamps = false;
	
	public $hidden = [
		'id', 'id_consulta'
	];
	
	
    public static function create($dia, $t, $consulta ){		
		$turno = new Turno();
		$turno->dia = $dia;
		$turno->horario = $t;
		$turno->id_consulta = $consulta;
		
		$turno->save();
		
		return $turno;
	}
}
