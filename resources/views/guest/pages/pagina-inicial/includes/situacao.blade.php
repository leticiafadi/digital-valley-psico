<div class="row">
	<div class="col col-12">
		<h2>Situação no programa</h2>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-6">
		<label for="">Encaminhado por *</label>
		<select class="custom-select" required name="encaminhado_por">
			<option {{old('encaminhado_por') == '' ? 'selected' : ''}} value="">Selecione a forma de encaminhamento</option>
			<option {{old('encaminhado_por') == 'professor' ? 'selected' : ''}} value="professor">Professor</option>
			<option {{old('encaminhado_por') == 'diretoria' ? 'selected' : ''}} value="diretoria">Diretoria</option>
			<option {{old('encaminhado_por') == 'expontaneo' ? 'selected' : ''}} value="espontaneo">Encaminhamento espontâneo </option>
		</select>

		@if ($errors->has('encaminhado_por'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('encaminhado_por') .'Selecione umaopção válida !!' }}</strong>
			</span>
		@endif

	</div>
	<div class="col-12 col-md-6">
		<div class="form-group">
			<label for="outro-encaminhamento">Forma de encaminhamento</label>
			<input type="text" id="outro-encaminhamento" class="form-control {{$errors->has('outro_encaminhamento') ? 'is-invalid' : ''}}" name="outro_encaminhamento" placeholder="Outra forma de encaminhamento" value="{{old('outro_encaminhamento')}}" maxlength="31">
		
			@if ($errors->has('outro_encamihamento'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('outro_encaminhamento') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="colco col-12">
		<div class="form-group">
			<label for="motivo">Motivo do encaminhamento</label>
		
			<input type="text" name="motivo" id="motivo" class="form-control {{$errors->has('motivo') ? 'is-invalid' : ''}}" maxlength="63" placeholder="Descreva sucintamente o motivo." value="{{old('motivo')}}">
			
			@if ($errors->has('motivo'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('motivo') }}</strong>
				</span>
			@endif
			
		</div>
	</div>
</div>