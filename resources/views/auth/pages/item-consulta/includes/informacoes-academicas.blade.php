<div class="row">
	<div class="col col-12">
		<h2>Informações acadêmicas</h2>
	</div>
</div>

<div class="row">
	<div class="col col-12 col-md-3 border">
		<label for="">Matricula</label>
		<h4>{{$consulta->matricula}}</h4>
	</div>
	<div class="col col-12 col-md-3 border">
		<label for="">Turno de curso</label>
		<h4>{{$consulta->turno}}</h4>
	</div>
	<div class="col col-12 col-md-3 border">
		<label for="">Formação escolar básica</label>
		@if($consulta->formacao_escolar == 'publica')
			<h4>Escola Pública</h4>
		@elseif($consulta->formacao_escolar == 'privada')
			<h4>Escola Privada</h4>
		@else
			<h4>Escola pública e privada</h4>
		@endif
	</div>
	<div class="col col-12 col-md-3 border">
		<label for="">Curso Atual</label>
		<h4>{{$consulta->curso_atual}}</h4>
	</div>
</div>

<div class="row">
	<div class="col col-12 col-md 3 border">
		<label for="">Semestre de ingresso</label>
		<h4>{{$consulta->semestre_ingresso}}</h4>
	</div>
	<div class="col col-12 col-md 3 border">
		<label for="">Semestre atual</label>
		<h4>{{$consulta->semestre}}</h4>
	</div>
	<div class="col col-12 col-md 3 border">
		<label for="">Semestre de ingresso.</label>
		<h4>{{$consulta->semestre_ingresso}}</h4>
	</div>
	<div class="col col-12 col-md 3 border">
		<label for="">Forma de ingresso</label>
		<h4>{{$consulta->forma_ingresso == 'cotas' ? 'Cotas' : 'Ampla concorrência' }}</h4>
	</div>
</div>

<div class="row">
	<div class="col col-12 border">
		<label for="">Cursos já concluidos</label>
		<h4>{{$consulta->cursos_concluidos ? $consulta->cursos_concluidos : '-'}}</h4>
	</div>
	<div class="col col-12 border">
		<label for="">Cursos em andamento</label>
		<h4>{{$consulta->cursos_em_andamento ? $consulta->cursos_em_andamento : '-'}}</h4>
	</div>
</div>
