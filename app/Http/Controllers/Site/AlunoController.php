<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\curso\Curso;
use GuzzleHttp;
use \Guzzle\Http\Exception\ConnectException;
use App\Models\aluno\Aluno;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    public function __construct(){
        $this->middleware("guest")->except('logout');
    }

    public function mostrarFormularioCadastrarAluno(Request $request)
    {
       // dd(!$request->session()->get('dadosPedido') && !$request->session()->get('_old_input'));
        if(!$request->session()->get('dadosPedido') && !$request->session()->get('_old_input'))
            return redirect('/pedidoCadastro')->withErrors(['credenciais' => 'Informe os dados abaixo para acessar o cadastro de aluno.'])->withInput();

        return view('guest.pages.cadastrar-aluno',['cursos' => Curso::all(), 'base_url' => env('APP_URL'), 'dadosPedido' => $request->session()->get('dadosPedido')]);   
    }
    
    public function mostrarformularioPedidoCadastro(Request $request)
    {
        return view("guest.pages.register-initial");
    }

    public function verificarPedidoCadastro(Request $request)
    {

        $validacao = Validator::make($request->input(), [
            'nome' => 'required',
            'matricula' => 'required'
        ]);

        if ($validacao->fails())
            return redirect()->back()->withErrors($validacao);

        if($this->verificarAluno($request->matricula))
            return redirect()->back()->withErrors(['credenciais' => 'A matrícula informada já pertence a outro usuário.']);

        $res = $this->buscarAlunoApi($request->matricula);
        $statusCode = $res->getStatusCode();
        switch($statusCode){
            case 200:
                $data = json_decode($res->getBody());
                if(count($data) > 0){
                    $data = $data[0];
                    if($data->matricula == $request->matricula && strtoupper($data->nome) == strtoupper($request->nome)){
                        return redirect('/realizarCadastro')->with(['dadosPedido' => ['nome' => $data->nome, 'matricula' => $data->matricula]]);
                    }else{
                        return redirect()->back()->withErrors(['credenciais' => 'O nome do aluno informado é inválido'])->withInput();
                    }   
                }else{
                    return redirect()->back()->withErrors(['credenciais' => 'A matrícula não existe em nossa base de dados. Favor entrar em contato com o N2S.'])->withInput();
                } 
            break;
            default:
                return redirect()->back()->withErrors(['credenciais' => 'A matrícula não existe em nossa base de dados. Favor entrar em contato com o N2S.'])->withInput();
            break;
        }
    }

    private function verificarAluno($matricula)
    {
        $aluno = Aluno::where('matricula', $matricula)->first();
        return $aluno != null;
    }

    private function buscarAlunoApi($matricula)
    {
        $client = new GuzzleHttp\Client(['http_errors' => false]);
        return $client->request('GET', config('api.base_url').$matricula, ['timeout' => 10000 ]);
    }
}
