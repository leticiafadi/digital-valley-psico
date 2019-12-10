@extends('auth.layouts.layout-basic')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
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
                    <img src="{{ asset ('imagens/template/atendimentos.jpg') }}" width="100%;" height="250px;" class="img-fluid" alt="">
                    
                    <!--<a href="https://br.freepik.com/fotos-vetores-gratis/pessoas">
                        Pessoas foto criado por freepik - br.freepik.com
                    </a> -->

                    <h4 class="small-box-footer">Atendimentos</h4>
                    
                    <form method="GET" action="{{ route('consultas.all') }}">
                        <button type="submit" class="btn mybtn py-2 px-5">Acessar</button>
                    </form>
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
                    <img src="{{ asset ('imagens/template/alunos.jpg') }}" width="100%;" height="250px;" class="img-fluid" alt="">
                    
                    <!--<a href="https://br.freepik.com/fotos-vetores-gratis/pessoas">
                        Pessoas foto criado por freepik - br.freepik.com
                    </a> -->

                    <h4 class="small-box-footer">Alunos</h4>
                    
                    <form method="GET" action="{{ route('alunos.all') }}">
                        <button type="submit" class="btn mybtn py-2 px-5">Acessar</button>
                    </form>
                </div>
            </div>
            
            
  
        </div>




        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="small-box mynav  text-center pb-2  mysombra-card">
                    <img src="{{ asset ('imagens/template/horarios.jpg') }}" width="100%;" height="250px;" class="img-fluid" alt="">
                    
                    <!--<a href="https://br.freepik.com/fotos-vetores-gratis/negocio">
                        Negócio foto criado por jannoon028 - br.freepik.com
                    </a>-->

                    <h4 class="small-box-footer">Horários</h4>
                
                    <form method="GET" action="{{ route('horario') }}">
                        <button type="submit" class="btn mybtn py-2 px-5">Acessar</button>
                    </form>
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
                        <img src="{{ asset ('imagens/template/psicólogos.jpg') }}" width="100%;" height="250px;" class="img-fluid" alt="">
                        
                        <!--<a href="https://br.freepik.com/fotos-vetores-gratis/escritorio">
                            Escritório foto criado por freepik - br.freepik.com
                        </a>-->

                        <h4 class="small-box-footer">Psicólogos</h4>
                        
                        <form method="GET" action="{{ route('usuarios.all') }}">
                            <button type="submit" class="btn mybtn py-2 px-5">Acessar</button>
                        </form>
                    </div>
            </div>
        </div>




    </div>
@endsection