<?php

namespace App\Models\contato;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table 	    = 'contato';
    protected $primaryKey 	= 'id';
    public $timestamps      = false;

    public static function create(array $data){
        $contato = new Contato();
        $contato->contato       = $data['contato'];
        $contato->tipo          = $data['tipo'];
        $contato->id_usuario    = $data['id_usuario'];
        $contato->save();

        return $contato;

    }
    
	
}
