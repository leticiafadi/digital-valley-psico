<ul class="sidebar navbar-nav mynav mylink">
    <li class="nav-item mt-3">
		<a class="nav-link" href="{{ route('home') }}">
			<i class="fas fa-fw fa-home wi"></i>
			<span>Gerenciar atendimentos</span>
		</a>
	</li>
    <li class="nav-item">
		<hr class="corhr">
	</li>
    <li class="nav-item">
		<a class="nav-link" href="{{ route('marcarAtendimento') }}">
			<i class="fas fa-fw fa-calendar wi"></i>
			<span>Marcar atendimento</span>
		</a>
    </li>
    <li class="nav-item">
		<hr class="corhr">
	</li>
    <li class="nav-item">
		<a class="nav-link" href=" {{route('gerenciarPerfil')}} ">
			<i class="fas fa-fw fa-user wi"></i>
			<span>Gerenciar perfil</span>
		</a>
	</li>
	<li class="nav-item">
		<hr class="corhr">
	</li>
</ul>