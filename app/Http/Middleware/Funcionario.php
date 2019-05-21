<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class Funcionario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        if(!Auth::check())
            return redirect('/login');
        if(Auth::user()->tipo != 'funcionario')
            if(Auth::user()->tipo == 'aluno')
                return redirect('/dashboard');
            else
                return redirect()->back()->withErrors(['nao_permitido' => 'Você não possui acesso a essa área']);

        return $next($request);
    }
}
