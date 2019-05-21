<div class="row">
	<div class="col col-12">
		<h2>Situção no programa</h2>
	</div>
</div>


<div class="row">
	<div class="col col-12 border">
		<label for="">Encaminhado por</label>
		<h4>{{$consulta->encaminhado_por != 'outro' ? @ucfirst($consulta->encaminhado_por) : $consulta->outro_encaminhamento}}</h4>
	</div>
</div>


<div class="row">
	<div class="col col-12 border">
		<label for="">Motivo de encaminhamento</label>
		<h4>{{$consulta->motivo ? $consulta->motivo : '-'}}</h4>
	</div>
</div>