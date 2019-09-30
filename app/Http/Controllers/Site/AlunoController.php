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
        if(!$request->session()->get('dadosPedido'))
            return redirect('./pedidoCadastro');

        return view('guest.pages.cadastrar-aluno',['cursos' => Curso::all(), 'base_url' => env('APP_URL'), 'dadosPedido' => $request->session()->get('dadosPedido')]);   
    }

    public function mostrarFormularioSolicitarCadastro(){
        return view('guest.pages.solicitarCadastro');
    }
    
    public function mostrarformularioPedidoCadastro(Request $request){
        return view("guest.pages.register-initial");
    }

    public function verificarPedidoCadastro(Request $request){ 

            $client = new GuzzleHttp\Client(['http_errors' => false]);
            $res = $client->request('GET', 'http://localhost:3100/'.$request->matricula, ['timeout' => 10000 ]);

            $statusCode = $res->getStatusCode();

            switch($statusCode){
                case 200:   
                    $data = json_decode($res->getBody());

            if($data->matricula == $request->matricula && strtoupper($data->nome) == strtoupper($request->nome)){
                        return redirect('/realizarCadastro')->with(['dadosPedido' => ['nome' => $data->nome, 'matricula' => $data->matricula]]);
                    }else{
                        return redirect()->back()->withErrors(['credenciais' => 'O nome do aluno informado é inválido'])->withInput();
                    }
                    break;
                case 404:
                    return redirect()->back()->withErrors(['credenciais' => 'A matrícula não existe em nossa base de dados.'])->withInput();
            }
            

    }
}
