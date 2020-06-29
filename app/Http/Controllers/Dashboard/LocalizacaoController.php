<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\localizacao\Pais;

class LocalizacaoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
		$this->middleware('funcionario');   

    }

    public function localizacao(){
        return view('auth.pages.gerenciar-localizacao.gerenciar-localizacao');
    }

    public function paises($id){
        $paises = Pais::where('id','>=', $id)->take(20);
        return response()->json($paises);
    }
}
