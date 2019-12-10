<?php

namespace App\Models\semestre;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Semestre extends Model{
    protected   $table = 'semestre';
    protected   $primaryKey = 'id';
    public      $timestamps = false;

    protected $fillable = [
        'ano',
        'periodo'
    ];
   
}
