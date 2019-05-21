<?php

namespace App\Models\usuarios;

	
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User; 

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable{

	use Notifiable;
	
	protected $table 		= 'usuario';
	protected $primaryKey 	= 'id';
	
	protected $hidden = [
		'remember_token', 'id_endereco'	
	];

	public static function create(array $data){
		$usuario = new Usuario();
		$usuario->nome_completo 	= $data['nome_completo'];
		$usuario->data_nascimento 	= $data['data_nascimento'];
		$usuario->genero 			= $data['genero'];
		$usuario->tipo				= $data['tipo'];
		$usuario->id_endereco 		= $data['id_endereco'];
		
		$usuario->save();

		return $usuario;
	} 

	
	public function endereco(){
		return $this->hasOne('App\Models\endereco\Endereco', 'id_endereco', 'id');
	}
	
	public function contatos(){
		return $this->hasMany('App\Models\contato\Contato', 'id', 'id_usuario');
	}
	
	public function funcionario(){
		//return $this->belogsTo('')
	}

}
