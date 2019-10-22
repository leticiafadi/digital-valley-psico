<nav class="navbar navbar-expand-md navbar-light navbar-laravel mysombra">
    <div class="container-fluid">
        <a class="navbar-brand " href="{{ url('/') }}">
            <img class="img-fluid" src="{{ asset ('imagens/template/psico.png') }}" alt="" width="170" >
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="container">
        

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if(isset($nome_path)&&$nome_path!='login')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> Entrar </a>
                    </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ str_limit(Auth::user()->nome_completo, 12)}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>&nbsp;Sair do sistema
                            </a>                                  
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>