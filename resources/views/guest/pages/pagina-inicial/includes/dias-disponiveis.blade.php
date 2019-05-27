<div class="row">
	<div class="col col-12">
		<h2>
			Horários disponíveis
		</h2>
		<span>
			<p>Marque os horários em que você está disponível para um atendimento.</p>
		</span>
	</div>
</div>


<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Segunda-feira</th>
				<th scope="col">Terça-feira</th>
				<th scope="col">Quarta-feira</th>
				<th scope="col">Quinta-feira</th>
				<th scope="col">Sexta-feira</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">08:00h - 10:00h</th>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno1" {{old('turno1') ? 'checked' : ''}} >
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno5" {{old('turno5') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno9" {{old('turno9') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno13" {{old('turno13') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno17" {{old('turno17') ? 'checked' : ''}}>
					</div>
				</td>
				
			</tr>
			<tr>
				<th scope="row">10:00h - 12:00h</th>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno2" {{old('turno2') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno6" {{old('turno6') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno10" {{old('turno10') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno14" {{old('turno14') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno18" {{old('turno18') ? 'checked' : ''}}>
					</div>
				</td>			
			</tr>
			<tr>
				<th scope="row">13:30h - 15:30h</th>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno3" {{old('turno3') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno7" {{old('turno7') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno11" {{old('turno11') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno15" {{old('turno15') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno19" {{old('turno19') ? 'checked' : ''}}>
					</div>
				</td>
			</tr>
			<tr>
				<th scope="row">15:30h - 17:30h</th>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno4" {{old('turno4') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno8" {{old('turno8') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno12" {{old('turno12') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno16" {{old('turno16') ? 'checked' : ''}}>
					</div>
				</td>
				<td>
					<div class="text-center">
						<input type="checkbox" name="turno20" {{old('turno20') ? 'checked' : ''}}>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="row">
	<div class="col col-12">
		<div class="form-group">
			<label for="observacoes-horarios">Informações sobre os horários</label>
			<input type="text" id="observacoes-horarios" class="form-control {{$errors->has('observacoes_horarios') ? 'is-invalid' : ''}}" name="observacoes_horarios" maxlenght="191" placeholder="Exemplo 'Terça-feira a cada 15 dias.'" value="{{old('observacoes_horarios')}}">
			
			@if ($errors->has('observacoes_horarios'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('observacoes_horarios') }}</strong>
				</span>
			@endif
			
		</div>
	</div>
</div>