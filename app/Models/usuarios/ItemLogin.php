<?php

namespace App\Models\usuarios;

use Illuminate\Database\Eloquent\Model;

class ItemLogin extends Model
{
    protected $table 		= 'item_login';
	protected $primaryKey 	= 'id';
	
	protected $hidden = [
		'id_login'
	];

	public static function create(array $data){
		$item 			= new ItemLogin();
		$item->id_login = $data['id_login'];
		$item->usuario 	= $data['usuario'];
		$item->save();

		return $item;
	}
	
	public function login(){
		return $this->hasOne('App\Models\usuarios\Login', 'id', 'id_login');
	}
	
}
