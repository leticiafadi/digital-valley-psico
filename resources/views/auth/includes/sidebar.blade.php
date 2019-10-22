<ul class="sidebar navbar-nav mynav mylink">
	<li class="nav-item">
		<a class="nav-link  pt-4 myborder pb-4" href="{{ route('home') }}">
			<i class="fas fa-fw fa-home wi "></i>
			<span>Página inicial</span>
		</a>
	</li>	
	<li class="nav-item">
		<a class="nav-link pt-4 myborder pb-4" href="{{ route('consultas.all') }}">
			<i class="fas fa-fw fa-calendar wi"></i>
			<span>Gerenciar atendimentos</span>
		</a>
	</li>

	<li class="nav-item ">
		<a class="nav-link pt-4 myborder pb-4" href=" {{route('usuarios.all')}} ">
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

	<li class="nav-item ">
		<a class="nav-link pt-4 myborder pb-4" href="{{route('alunos.all')}}">
			<i class="fas fa-fw fa-user-graduate wi"></i>
			<span>Visualizar alunos</span>
		</a>
	</li>

	<li class="nav-item ">
		<a class="nav-link pt-4 myborder pb-4" href="{{route('horario')}}">
			<i class="fas fa-fw fa-clock-o wi"></i>
			<span>Gerenciar horários</span>
		</a>
	</li>

</ul>