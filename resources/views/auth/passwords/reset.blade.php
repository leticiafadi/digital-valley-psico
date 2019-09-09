@extends('guest.layouts.layout-basic')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header"><i class="fas fa-key"></i> Redefinir senha</div>
                <div class="card-body">
                    <form method="POST" action="{{route('redefinirSenha')}}">

                        {{csrf_field()}}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Digite a sua nova Senha</label>
                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" placeholder="Digite sua nova senha" name="senha">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Digite novamente a senha</label>
                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" placeholder="Digite novamente a senha" name="repetir_senha">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
