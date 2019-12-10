<?php

namespace App\Models\semestre;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InfoSemestre extends Model{
    protected   $table = 'info_aluno_semestre';
    protected   $primaryKey = 'id';
    public      $timestamps = false;

    protected $filiable = [
        'id_aluno',
        'id_semestre',
        'estado_civil',
        'reside_com',
        'reside_outros',
        'formacao_escolar',
        'turno',
        'semestre_atual',
        'forma_ingresso',
        'tipo_cotas',
        'cursos_concluidos',
        'cursos_andamento',
        'possui_auxilio',
        'tipo_auxilio',
        'possui_bolsa',
        'tipo_bolsa',
        'possui_filhos'
    ];
   
}
