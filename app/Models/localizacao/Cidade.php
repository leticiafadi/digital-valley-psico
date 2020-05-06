<?php

namespace App\Models\localizacao;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table 		= 'cidade';
	protected $primaryKey 	= 'id';

	public $timestamps = false;
		
	protected $filliable = [
		
	];
	
	protected $hidden = [
		
	];

	public function estado(){
		return $this->hasOne("App\Models\localizacao\Estado", 'id' , 'id_estado');
	}
}
