@extends('auth.layouts.layout-basic')
@section('content')

   
<<<<<<< HEAD
 
    @if($cursos)
    <div class="container">
      
=======
  
@if($cursos)
    <div class="container">      
>>>>>>> dfdb10e0b1a1df09e0e2bc57d2271fc5248bb694
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
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    @endif
    

=======
@endif
>>>>>>> dfdb10e0b1a1df09e0e2bc57d2271fc5248bb694
    

{{--
<curso :base-url="{{'"'.$base_url.'"'}}"></curso>   AQUI ERA OTRA FORMA DE LISTAR OS CURSOS
--}}

@endsection