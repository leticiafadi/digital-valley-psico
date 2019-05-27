<ul class="sidebar navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ route('home') }}">
			<i class="fas fa-fw fa-home"></i>
			<span>Início</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('consultas.all') }}">
			<i class="fas fa-fw fa-calendar"></i>
			<span>Atendimentos</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href=" {{route('usuarios.all')}} ">
			<i class="fas fa-fw fa-users"></i>
			<span>Gerenciar usuários</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href=" {{route('cursos.all')}} ">
			<i class="fas fa-fw fa-graduation-cap"></i>
			<span>Gerenciar cursos</span>
		</a>
	</li>
</ul>