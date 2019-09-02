@extends('auth.layouts.layout-basic')
@section('content')

   
 
    @if($cursos)
    <div class="container">
      
        <div class="card">
            <div class="card-header">Cursos</div>
            <div class="card-body">
            <div class="row">
       	<div class="col col-12 mb-3">
            @if(sizeof($cursos) > 0)
                <ul class="list-group">
                    @foreach($cursos as $curso)
                        <li class="list-group-item"><h5>{{$curso->nome}}</h5></li>
                    @endforeach
                </ul>
            @else
                <ul class="list-group">
                    <li class="list-group-item">
                        Não possui nenhum curso cadastrado
                    </li>
                </ul>
            @endif
        </div>
       </div>

       <div class="row">
            <div class="col col-12">
                <h5>Adicionar um curso</h5>
            </div>

            <div class="col col-12">
                <form action="/cursos/create" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col col-10">
                                <input type="text" id="nome" name="nome" placeholder="Nome do curso" required maxlength="31" class="form-control mr-2">
                            </div>
                            <div class="col col-1">
                                <button type="submit" class="btn btn-primary ">Criar curso</button>
                            </div>
                        </div>
                </form>            
            </div>

       </div>
            </div>
        </div>
    </div>
    @endif
    

    

<curso :base-url="{{'"'.$base_url.'"'}}"></curso>

@endsection