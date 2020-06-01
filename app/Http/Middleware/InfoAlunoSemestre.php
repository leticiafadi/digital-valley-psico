<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use \App\Models\aluno\Aluno as AlunoModel;
use \App\Models\usuarios\Usuario;
use \App\Models\semestre\Semestre;
use \App\Models\semestre\InfoSemestre;


use Closure;

class InfoAlunoSemestre
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        if(!InfoSemestre::where('id_semestre', Semestre::orderBy('id', 'desc')->first()->id)->where('id_aluno', AlunoModel::where('id_usuario', Auth::user()->id)->first()->id)->first()){
            return redirect('/manter-informacoes');
        }

        return $next($request);
    }
}
