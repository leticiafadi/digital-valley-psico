<?php

namespace App\Http\Controllers\DashboardAluno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\BuscarAluno;

class InformacoesController extends Controller
{
    use BuscarAluno;

    public function __construct(){
        $this->middleware('aluno');
    }

    public function manterInformacoesSemestre()
    {
        return view("aluno.manter-informacoes-semestre");
    }

    public function atualizarInfoSemestre(Request $request)
    {
        dd($request);
    }

}
