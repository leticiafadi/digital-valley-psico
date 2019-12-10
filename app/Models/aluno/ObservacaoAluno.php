<?php

namespace App\Models\aluno;

use Illuminate\Database\Eloquent\Model;
use App\Models\usuarios\Usuario;
use Illuminate\Support\Facades\DB;

class ObservacaoAluno extends Model
{
    protected $table 	    = 'observacoes_aluno';
    protected $primaryKey 	= 'id';
    public $timestamps      = false;

    protected $fillable = [
        'comentario',
        'id_aluno'
    ];


}