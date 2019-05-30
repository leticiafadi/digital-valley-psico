<div class="row">
	<div class="col col-12">
		<h2>Horários disponíveis</h2>
	</div>
</div>


<div class="row">
	<div class="col col-12 table-striped table-responsive">
		<table class="table">
			<thead>
				<th scope="col"></th>
				<th scope="col">Segunda</th>
				<th scope="col">Terça</th>
				<th scope="col">Quarta</th>
				<th scope="col">Quinta</th>
				<th scope="col">Sexta</th>
			</thead>
			<tbody>	
				@php
					$aux = 0;
					$dias = [ 'horario','seg', 'ter', 'qua', 'qui', 'sex'];
					$horarios = ['a', 'b', 'c', 'd'];
					$horariosDisponiveis = $consulta->horarios;
				@endphp
		
				@foreach ( $horarios as $horario )
					<tr scope="row">
					@foreach ( $dias as $dia )
						@if($dia == 'horario')
							@if($horario == 'a')
								<td>08:00 - 10:00</td>
							@elseif($horario == 'b')
								<td>10:00 - 12:00</td>
							@elseif($horario == 'c')
								<td>13:30 - 15:30</td>
							@else 
								<td>15:30 - 17:30</td>
							@endif
						@else 
							@if( sizeof($horariosDisponiveis) > $aux and $horariosDisponiveis[$aux]->dia == $dia and $horariosDisponiveis[$aux]->horario == $horario)
								<td>
									<div class="text-center">
										<i class="fas fa-times"></i>
									</div>
								</td>
								@php
									$aux++	
								@endphp
							@else
								<td></td> 
							@endif
						@endif
					@endforeach
					</tr>
				@endforeach
 
				
			</tbody>
		</table>
	</div>
</div>


<div class="row">
	<div class="col col-12 border">
		<label for="">Informações do horário</label>
		<h2>{{$consulta->observacoes_horarios}}</h2>
	</div>
</div>