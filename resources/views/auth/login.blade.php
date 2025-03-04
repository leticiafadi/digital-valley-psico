@extends('auth.layouts.layout-navbar')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-sign-in-alt mycolor-azul"></i>&nbsp;Entrar no sistema
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuário</label>

                            <div class="col-md-6">
                                <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" placeholder="E-mail ou matrícula" required autofocus autocomplete="off">

                                @if ($errors->has('usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"> Senha </label>

                            <div class="col-md-6">
                               <mostrar-senha :nome="'password'"></mostrar-senha> 

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col col-md-8 offset-md-4">
                                <a href="{{route('passwordreset.show-link-request-form')}}">Esqueceu sua senha?</a>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn mybtn-table">
                                    Entrar no sistema
                                </button>                                
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col col-md-8 offset-md-4">
                                <a href="{{route('verificarPedidoCadastro')}}">É novo aqui? Registrar-se</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
