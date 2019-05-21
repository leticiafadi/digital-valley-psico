<?php

namespace App\Models\curso;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id';

    protected $hidden= [
        'created_at', 'updated_at'
    ];

    public static function create($array = null){
        $curso = new Curso();
        $curso->nome = $array['nome'];
        $curso->ativo = 1;
        $curso->save();
        
        return $curso;
    }

}
