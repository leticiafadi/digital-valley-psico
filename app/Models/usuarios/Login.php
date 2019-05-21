<?php

namespace App\Models\usuarios;

use Illuminate\Database\Eloquent\Model;

class Login extends Model{
	protected $table 		= "login";
	protected $primaryKey 	= "id";
	
	protected $hidden = [
		'id_usuario', 'senha', 'id'
	];

	public static function create(array $data){
		$login 				= new Login();
		$login->senha 		= bcrypt($data['senha']);
		$login->id_usuario 	= $data['id_usuario'];
		$login->save();

		return $login;
	}
	
	public function usuario(){
		return $this->hasOne('App\Models\usuarios\Usuario', 'id', 'id_usuario');
	}
}
