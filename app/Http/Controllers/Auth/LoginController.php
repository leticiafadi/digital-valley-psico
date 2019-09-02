<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\usuarios\ItemLogin;
use App\Models\usuarios\Login;
use App\Models\usuarios\Usuario;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginform(Request $request){
       
        return view('auth.login')->with('nome_path', 'login');
    }

    //meu login
    public function logar(request $request){


        
        //tera de validar o login aqui
        
        //bloqueia o ip caso tenha varias tentativas de login
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return redirect('/login')->withErrors(['login' => 'Várias tentativas de login, tente novamente mais tarde']);
            //return $this->sendLockoutResponse($request);
        }
         
        
        //encontrando o login 
        $login = $this->matchLogin($request->only('usuario'));

        if(!empty($login['id'])){

            $login = $login->login;

            if (!empty($login['id'])) {
                if (Hash::check($request->input('password'), $login['senha'])) {
                    $usuario = $login->usuario;
                    Auth::login($usuario, false);
                    return $this->sendLoginResponse($request);
                }
            }
        }
        
        //caso algo não de certo
        $this->incrementLoginAttempts($request);
        return redirect('/login')->withErrors(['login' => 'Usuário inexistente ou senha incorreta']);
        //return $this->sendFailedLoginResponse($request);
        

    }
    //funcao encontrar o login
    private function matchLogin(array $data){
        return ItemLogin::where('usuario', '=', $data['usuario'])->get()->first();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
