<ul class="sidebar navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="{{ route('home') }}">
			<i class="fas fa-fw fa-home"></i>
			<span>Página inicial</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{ route('consultas.all') }}">
			<i class="fas fa-fw fa-calendar"></i>
			<span>Gerenciar atendimentos</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href=" {{route('usuarios.all')}} ">
			<i class="fas fa-fw fa-users"></i>
			<span>Gerenciar psicólogos</span>
		</a>
	</li>
	<!--<li class="nav-item">
		<a class="nav-link" href=" {{route('cursos.all')}} ">
			<i class="fas fa-fw fa-graduation-cap"></i>
			<span>Visualizar cursos</span>
		</a>
	</li>-->
	<li class="nav-item">
		<a class="nav-link" href="{{route('alunos.all')}}">
			<i class="fas fa-fw fa-user-graduate"></i>
			<span>Visualizar alunos</span>
		</a>
	</li>
</ul>