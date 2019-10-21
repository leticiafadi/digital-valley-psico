<ul class="sidebar navbar-nav mynav mylink">
	<li class="nav-item mt-3">
		<a class="nav-link" href="{{ route('home') }}">
			<i class="fas fa-fw fa-home wi"></i>
			<span>Página inicial</span>
		</a>
	</li>
	<li class="nav-item">
		<hr class="corhr">
	</li>
	
	<li class="nav-item">
		<a class="nav-link" href="{{ route('consultas.all') }}">
			<i class="fas fa-fw fa-calendar wi"></i>
			<span>Gerenciar atendimentos</span>
		</a>
	</li>
	<li class="nav-item">
		<hr class="corhr">
	</li>
	<li class="nav-item">
		<a class="nav-link" href=" {{route('usuarios.all')}} ">
			<i class="fas fa-fw fa-users wi"></i>
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
		<hr class="corhr">
	</li>
	<li class="nav-item">
		<a class="nav-link" href="{{route('alunos.all')}}">
			<i class="fas fa-fw fa-user-graduate wi"></i>
			<span>Visualizar alunos</span>
		</a>
	</li>
	<li class="nav-item">
		<hr class="corhr">
	</li>
</ul>