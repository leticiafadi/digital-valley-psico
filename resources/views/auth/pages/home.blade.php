@extends('auth.layouts.layout-basic')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-6 col-lg-3">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <!--<div class="inner">
                        <h3>{{--numeor de atendmentos marcados ainda nao lidos--}}{{$atendimentos}}</h3>
                        <p>Atendimentos agendados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar"></i>
                    </div>-->
                    <img src="{{ asset ('imagens/template/atendimentos.png') }}" class="img-fluid" alt="">
                    <a href="{{route('consultas.all')}}" class="small-box-footer">
                        Atendimentos<i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col col-12 col-sm-6 col-lg-3">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <!--<div class="inner">
                        <h3>{{$numeroDeCursos}}</h3>
                        <p>Cursos cadastrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-graduation-cap"></i>
                    </div>-->
                    <img src="{{ asset ('imagens/template/cursos.jpg') }}" class="img-fluid" alt="">
                    <a href="{{route('alunos.all')}}" class="small-box-footer">
                        Alunos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col col-12 col-sm-6 col-lg-3">
                <div class="small-box bg-blue">
                    <img src="{{ asset ('imagens/template/estatisticas.jpg') }}" class="img-fluid" alt="">
                    <a href="" class="small-box-footer">
                        Estatísticas <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col col-12 col-sm-6 col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <!--<div class="inner">
                            <h3>{{$numeroDeFuncionarios}}</h3>
                            <p>Usuários cadastrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>-->
                        <img src="{{ asset ('imagens/template/psicologos.jpg') }}" class="img-fluid" alt="">
                        <a href="{{route('usuarios.all')}}" class="small-box-footer">
                            Psicólogos <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
            </div>
        </div>
    </div>
@endsection