<div class="row">
	<div class="col col-12">
		<h2>Condição de vínculo com a UFC</h2>
	</div>
</div>

<div class="row">
	<div class="col col-12 col-md-2 border">
		<label for="">Possui auxílio</label>
		<h4>{{$consulta->auxilio ? 'Sim' : 'Não'}}</h4>
	</div>
	<div class="col col-12 col-md-5 border">
		<label for="">Tipo de auxilio</label>
		<h4>{{$consulta->auxilio ? $consulta->tipo_auxilio : '-'}}</h4>
	</div>
	<div class="col col-12 col-md-5 border">
		<label for="">Período de auxílio</label>
		<h4>{{$consulta->auxilio ? $consulta->periodo_auxilio : '-'}}</h4>
	</div>
</div>


<div class="row">
	<div class="col col-12 col-md-2 border">
		<label for="">Possui Bolsa</label>
		<h4>{{$consulta->bolsista ? 'Sim' : 'Não'}}</h4>
	</div>
	<div class="col col-12 col-md-5 border">
		<label for="">Tipo de bolsa</label>
		<h4>{{$consulta->bolsista ? $consulta->tipo_bolsa : '-'}}</h4>
	</div>
	<div class="col col-12 col-md-5 border">
		<label for="">Período de Bolsa</label>
		<h4>{{$consulta->bolsista ? $consulta->periodo_bolsa : '-'}}</h4>
	</div>
</div>

<div class="row">
	<div class="col col-12 col-md-6 border">
		<label for="">Outros</label>
		<h4>{{$consulta->outra_forma_de_condicao ? $consulta->outra_forma_de_condicao : '-'}}</h4>
	</div>
	<div class="col col-12 col-md-6 border">
		<label for="">Período</label>
		<h4>{{$consulta->outra_forma_de_condicao ? $consulta->outa_forma : '-'}}</h4>
	</div>
</div>


