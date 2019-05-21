@extends('auth.layouts.layout-basic')
@section('content')

   
   
   
    <div class="container">
      
        <div class="row">
            <div class="col col-12">
                <a href="users/create" class="btn fa-pull-right">Criar novo administrador</a>
            </div>
        </div>
      
        @if($funcionarios)
      
            <div class="row">
                <div class="col col-12">
                    <ul class="list-group">
                        @foreach($funcionarios as $funcionario)
                            <li class="list-group-item">{{$funcionario->usuario->nome_completo}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
       
         @endif
       
        

    </div>

@endsection