<div class="row">
	<div class="col com-12">
		<h2>Condição de vínculo com a UFC</h2>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-2">
		<label for="">Possui auxílio *</label>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="auxilio" id="pssui-auxilio" value="1" {{old('auxilio') == '1'  ? 'checked' : ''}} required>
				<label class="form-check-label" for="possui-auxilio" >Sim</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="auxilio" id="nao-possui-auxilio" value="0"   {{old('auxilio') == '0' ? 'checked' : ''}} required>
				<label class="form-check-label" for="nao-posui-auxilio">Não</label>
			</div>

			@if ($errors->has('auxilio'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ "Marque uma opção válida !!" }}</strong>
				</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-5">
		<div class="form-group">
			<label for="tipo-auxilio">Tipo de auxílio</label>
			<input type="text" class="form-control {{$errors->has('auxilio') ? 'is-invalid' : ''}}" id="tipo-auxilio" name="tipo_auxilio" placeholder="Tipo de auxilio" maxlength="31" value="{{old('tipo_auxilio')}}">

			@if ($errors->has('tipo_auxilio'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('tipo_auxilio') }}</strong>
				</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-5">
		<div class="form-group">
			<label for="periodo-auxilio">Data de início e de término</label>
			<input type="text" class="form-control periodo-mask {{$errors->has('periodo_auxilio') ? 'is-invalid' : ''}}" id="periodo-auxilio" name="periodo_auxilio" placeholder="periodo de auxilio" value="{{old('periodo_auxilio')}}" maxlength="31">

			@if ($errors->has('periodo_auxilio'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('periodo_auxilio') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-2">
		<label for="">Possui bolsa *</label>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="bolsista" id="pssui-bolsa" value="1" {{old('bolsista') == '1' ? 'checked' : ''}} required>
				<label class="form-check-label" for="possui-bolsa">Sim</label>
			</div> 
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="bolsista" id="nao-possui-bolsa" value="0" {{old('bolsista') == '0' ? 'checked' : ''}} required>
				<label class="form-check-label" for="nao-posui-bolsa">Não</label>
			</div>

			@if ($errors->has('bolsista'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('bolsista') }}</strong>
				</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-5">
		<div class="form-group">
			<label for="tipo-bolsa">Tipo de bolsa</label>
			<input type="text" class="form-control {{$errors->has('tipo_bolsa') ? 'is-invalid' : ''}}" id="tipo-bolsa" name="tipo_bolsa" placeholder="Tipo de auxilio" maxlength="31" value="{{old('tipo_bolsa')}}">

			@if ($errors->has('tipo_bolsa'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('tipo_bolsa') }}</strong>
				</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-5">
		<div class="form-group">
			<label for="periodo-bolsa">Data de início e de término</label>
			<input type="text" class="form-control periodo-mask {{$errors->has('periodo_bolsa') ? 'is-invalid' : ''}}" id="periodo-bolsa" name="periodo_bolsa" placeholder="periodo de bolsa" value="{{old('periodo_bolsa')}}" maxlength="31">

			@if ($errors->has('periodo_bolsa'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('periodo_bolsa') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-6">
		<div class="form-group">
			<label for="outra-forma">Outro</label>
			<input type="text" class="form-control {{$errors->has('outra_forma_de_condicao') ? 'is-invalid' : ''}}" id="outra-forma" name="outra_forma_de_condicao" placeholder="Outras formas" maxlength="31" value="{{old('outra_forma_de_condicao')}}">

			@if ($errors->has('outra_forma_de_condicao'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('outra_forma_de_condicao') }}</strong>
				</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-6">
		<div class="form-group">
			<label for="periodo-outra-forma">Data de início e de término</label>
			<input type="text" class="form-control periodo-mask {{$errors->has('periodo_outra_forma') ? 'is-invalid' : ''}}" id="periodo-outra-forma" name="periodo_outra_forma" placeholder="Periodo" value="{{old('periodo_outra_forma')}}" maxlength="31">

			@if ($errors->has('periodo_outra_forma'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('periodo_outra_forma') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>