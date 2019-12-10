@extends('guest.layouts.layout-basic')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-sign-in-alt mycolor-azul"></i>&nbsp;Solicitar Cadastro
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">

                        <div class="form-group row">
                            <label for="Nome" class="col-md-4 col-form-label text-md-right"">Nome</label>

                            <div class="col-md-6">
                                <input id="Nome" type="text" class="form-control" required  placeholder="Nome Completo" name="nome">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right"> Matrícula </label>

                            <div class="col-md-6">
                                <input id="matricula" type="password" class="form-control" required  placeholder="Matrícula" name="matricula">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
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
