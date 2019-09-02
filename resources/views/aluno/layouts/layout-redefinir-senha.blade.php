<link href="{{ asset('css/app.css') }}" rel="stylesheet">

 @include('errors.includes.navbar')

<div class="container col-mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-sign-in-alt"></i>&nbsp;Recuperação de senha
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">Digite a nova senha</label>
                            <div class="col-md-8">
                                <input type="password" placeholder="digite sua senha">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-right">Digite novamente a senha</label>
                            <div class="col-md-8">
                                <input type="password" placeholder="digite sua senha">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Redefinir Senha
                                </button>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>

