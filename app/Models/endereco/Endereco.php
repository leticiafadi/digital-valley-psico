<?php

namespace App\Models\endereco;

use App\Models\localizacao\Cidade;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';
    protected $primaryKey = 'id';
    public $timestamps = false;
	
    protected $fillable = ['*'];

    public function cidade() {
	return $this->belongsTo(\App\Models\localizacao\Cidade::class, 'id_cidade','id');
    }

}


