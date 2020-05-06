<?php

namespace App\Models\localizacao;

use Illuminate\Database\Eloquent\Model;
use App\Models\localizacao\Cidade;

class Estado extends Model
{
    protected $table 		= 'estado';
	protected $primaryKey 	= 'id';

	public $timestamps = false;
	
	protected $hidden = [
		
	];

	public function cidades(){
		return $this->hasMany('App\Models\localizacao\Cidade', 'state_id', 'id');
	}

}
