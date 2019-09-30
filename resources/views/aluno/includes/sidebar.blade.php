<ul class="sidebar navbar-nav">
    <li class="nav-item">
		<a class="nav-link" href="{{ route('home') }}">
			<i class="fas fa-fw fa-home"></i>
			<span>Gerenciar atendimentos</span>
		</a>
	</li>
    
    <li class="nav-item">
		<a class="nav-link" href="{{ route('marcarAtendimento') }}">
			<i class="fas fa-fw fa-calendar"></i>
			<span>Marcar atendimento</span>
		</a>
    </li>
    
    <li class="nav-item">
		<a class="nav-link" href=" {{route('gerenciarPerfil')}} ">
			<i class="fas fa-fw fa-user"></i>
			<span>Gerenciar perfil</span>
		</a>
	</li>
</ul>