@extends('aluno.layouts.layout-navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header"> <i class="fas fa-user-plus text-primary"></i> Solicitação de cadastro</div>
                    <div class="card-body">

                    <form method="POST" action="{{route('verificarPedidoCadastro')}}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nome Completo</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" placeholder="Digite o seu Nome Completo" name="nome">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Matricula</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" placeholder="Digite a sua Matricula" name="matricula" maxlength="6" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Continuar
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

