@extends('guest.layouts.layout-basic')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header">Redefinir senha</div>

                <div class="card-body">


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Digite a sua nova Senha</label>
                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" placeholder="Digite sua nova senha" name="senha">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Digite novamente a senha</label>
                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" placeholder="Digite novamente a senha" name="novasenha">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn mybtn-table btn-block">
                                    Redefinir Senha
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
