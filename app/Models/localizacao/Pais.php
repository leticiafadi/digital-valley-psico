<?php

namespace App\Models\localizacao;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table 		= 'pais';
	protected $primaryKey 	= 'id';
	
	protected $filtable = [
		
	];
	
	protected $hidden = [
		'sortname', 'phonecode'
	];

	public function estados(){
		return $this->hasMany('App\Models\localizacao\Estado', 'country_id', 'id');	
	}


}
