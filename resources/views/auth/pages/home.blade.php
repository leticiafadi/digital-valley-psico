@extends('auth.layouts.layout-basic')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 ">
                <!-- small box -->
                <div class="small-box mynav text-center pb-2 mysombra-card">
                    <!--<div class="inner">
                        <h3>{{--numeor de atendmentos marcados ainda nao lidos--}}{{$atendimentos}}</h3>
                        <p>Atendimentos agendados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar"></i>
                    </div>-->
                    <img src="{{ asset ('imagens/template/atendimentos.png') }}" class="img-fluid" alt="">
                    <a href="{{route('consultas.all')}}" class="small-box-footer">
                        <h4>Atendimentos<h4>
                    </a>
                    <button type="button" class="btn mybtn py-2 px-5">Acessar</button>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12  ">
                <!-- small box -->
                <div class="small-box mynav  text-center pb-2  mysombra-card">
                    <!--<div class="inner">
                        <h3>{{$numeroDeCursos}}</h3>
                        <p>Cursos cadastrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-graduation-cap"></i>
                    </div>-->
                    <img src="{{ asset ('imagens/template/cursos.jpg') }}" class="img-fluid" alt="">
                    <a href="{{route('alunos.all')}}" class="small-box-footer">
                        <h4>Alunos</h4>
                    </a>
                    <button type="button" class="btn mybtn py-2 px-5">Acessar</button>
                </div>
            </div>
            
  
        </div>




        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="small-box mynav  text-center pb-2  mysombra-card">
                    <img src="{{ asset ('imagens/template/estatisticas.png') }}" class="img-fluid" alt="">
                    <a href="" class="small-box-footer">
                        <h4>Estatísticas</h4>
                    </a>
                    <button type="button" class="btn mybtn py-2 px-5">Acessar</button>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12  ">
                    <!-- small box -->
                    <div class="small-box mynav  text-center pb-2 mysombra-card">
                        <!--<div class="inner">
                            <h3>{{$numeroDeFuncionarios}}</h3>
                            <p>Usuários cadastrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>-->
                        <img src="{{ asset ('imagens/template/psicologo-trabalhando.jpg') }}" class="img-fluid" alt="">
                        <a href="{{route('usuarios.all')}}" class="small-box-footer">
                            <h4>Psicólogos</h4>
                        </a>
                        <button type="button" class="btn mybtn py-2 px-5">Acessar</button>
                    </div>
            </div>
        </div>




    </div>
@endsection