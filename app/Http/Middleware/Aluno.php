<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class Aluno
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
        if(!Auth::check())
            return redirect('/login');
        if(Auth::user()->tipo != 'aluno')
            if(Auth::user()->tipo == 'funcionario')
                return redirect('/home')->withErrors(['nao_permitido' => 'Você não possui acesso a essa área']);
            else
                return redirect()->back()->withErrors(['nao_permitido' => 'Você não possui acesso a essa área']);

        

        return $next($request);
    }
}
