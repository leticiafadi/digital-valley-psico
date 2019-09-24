<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\curso\Curso;
use GuzzleHttp;
use \Guzzle\Http\Exception\ConnectException;


class AlunoController extends Controller
{
    public function __construct(){
        $this->middleware("guest")->except('logout');
    }

    public function mostrarFormularioCadastrarAluno(Request $request){
        return view('guest.pages.cadastrar-aluno',['cursos' => Curso::all(), 'base_url' => env('APP_URL')] );   
    }

    public function mostrarFormularioSolicitarCadastro(){
        return view('guest.pages.solicitarCadastro');
    }
    
    public function mostrarformularioPedidoCadastro(Request $request){
        return view("guest.pages.register-initial");
    }

    public function verificarPedidoCadastro(Request $request){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'http://localhost:10222/verificarAluno/888888', ['timeout' => 2000 ]);

        $data = json_decode($res->getBody());

       dd($data);

    }
}
