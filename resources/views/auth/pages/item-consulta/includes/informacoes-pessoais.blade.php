<div class="row">
	<div class="col col-12">
		<h2>Informações Pessoais</h2>
	</div>
</div>


<div class="row">
	<div class="col col-12 border">
		<label for="">Nome</label>
		<h4>{{$consulta->nome}}</h4>
	</div>
</div>

<div class="row">
	<div class="col col-12 col-md-6 border">
		<label for="">Data de nascimento</label>
		<h4>{{date('d/m/Y', strtotime($consulta->data_nascimento))}}</h4>
	</div>
	<div class="col col-12 col-md-6 border">
		<label for="">Naturalidade</label>
		<h4>{{$consulta->naturalidade}}</h4>
	</div>
</div>

<div class="row">
	<div class="col col-12 col-md-4 border">
		<label for="">Estado Civil</label>
		<h4>{{$consulta->estado_civil}}</h4>
	</div>
	<div class="col col-12 col-md-4 border">
		<label for="">Possui filhos</label>
		<h4>{{$consulta->filhos == 'sim' ? "Sim" : "Não"}}</h4>
	</div>
	<div class="col col-12 col-md-4 border">
		<label for="">Reside com</label>
		<h4>{{$consulta->reside_com ? $consulta->reside_com : $consulta->reside_com_outro}}</h4>
	</div>
</div>


<div class="row">
	<div class="col col-12 border">
		<label for="">Endereço</label>
		<h4>{{$consulta->endereco}}</h4>
	</div>
</div>


<div class="row">
	<div class="col col-12 col-md-6 border">
		<label for="">Email</label>
		<h4>{{$consulta->email}}</h4>
	</div>
	<div class="col col-12 col-md-6 border">
		<label for="">Telefone Celular</label>
		<h4>{{$consulta->telefone_celular}}</h4>
	</div>
</div>


<div class="row">
	<div class="col col-12 col-md-6 border">
		<label for="">Telefone residencial</label>
		<h4>{{$consulta->telefone_residencial ? $consulta->telefone_residencial : "-"}}</h4>
	</div>
	<div class="col col-12 col-md-6 border">
		<label for="">Outros telefones</label>
		<h4>{{$consulta->telefone_outros ? $consulta->telefone_outros : "-"}}</h4>
	</div>
</div>