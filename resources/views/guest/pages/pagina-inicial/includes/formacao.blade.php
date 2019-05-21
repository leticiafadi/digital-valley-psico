<div class="row">

	<div class="col col-12">
		<h3>Informações acadêmicas </h3>
	</div>

</div>

<div class="row">
	<div class="col col-12 col-md-3">
		<div class="form-group">
			<label for="formacao-escolar">Formação escolar básica *</label>
			<select name="formacao_escolar" id="formacao-escolar" class="form-control  custom-select {{$errors->has('formacao_escolar') ? 'is-invalid' : ''}}" required>
				<option {{old('formacao_escolar') == '' ? 'selected' : ''}} value="">Selecione uma opção</option>
				<option {{old('formacao_escolar') == 'publica' ? 'selected' : ''}} value="publica">Escola pública</option>
				<option {{old('formacao_escolar') == 'privada' ? 'selected' : ''}} value="privada">Escola privada</option>
				<option {{old('formacao_escolar') == 'ambos' ? 'selected' : ''}} value="ambos">Escola pública e privada</option>
			</select>

			@if ($errors->has('formacao_escolar'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('formacao_escolar') }}</strong>
				</span>
			@endif	

		</div>
	</div>
	<div class="col col-12 col-md-3">
		<div class="form-group">
			<label for="turno">Turno do curso na UFC *</label>
			<input type="text" class="form-control" id="turno" name="turno" placeholder="Digite o turno de seu curso atual" maxlength="15" required value="{{old('turno')}}">

			@if ($errors->has('turno'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('turno') }}</strong>
				</span>
			@endif	

		</div>
	</div>
	<div class="col col-12 col-md-3">
	<div class="form-group">
			<label for="curso-atual">Selecione seu curso *</label>
			<select name="curso_atual" id="curso-atual" class="form-control  custom-select {{$errors->has('curso_atual') ? 'is-invalid' : ''}}" required>
				<option {{old('curso_atual') == '' ? 'selected' : ''}} value="">Selecione uma opção</option>
				@foreach($cursos as $curso)
					<option {{old('curso_atual') == $curso->nome ? 'selected' : ''}} value="{{$curso->nome}}">{{$curso->nome}}</option>
				@endforeach
			</select>

			@if ($errors->has('curso_atual'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('formacao_escolar') }}</strong>
				</span>
			@endif	

		</div>
	</div>
	<div class="col col-12 col-md-3">
		<div class="form-group">
			<label for="matricula">Matricula *</label>
			<input type="text" class="form-control matricula-mask {{$errors->has('matricula') ? 'is-invalid' : '' }}" maxlength="6" required name="matricula" placeholder="Matricula" value="{{old('matricula')}}">

			@if ($errors->has('matricula'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('matricula') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-3">
		<div class="form-group">
			<label for="matricula">Semestre atual *</label>
			<input type="text" class="form-control {{$errors->has('semestre') ? 'id-invalid' : ''}}" maxlength="31" required name="semestre" placeholder="Semestre atual" value="{{old('semestre')}}">
		
			@if ($errors->has('semestre'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('semetre') }}</strong>
				</span>
			@endif	
		
		</div>
	</div>
	<div class="col col-6 col-md-3">
		<label for="">Forma de ingresso *</label>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="forma_ingresso" id="ampla" value="ampla" required {{old('forma_ingresso') == 'ampla' ? 'checked' : ''}}>
				<label class="form-check-label" for="ampla">Ampla Concorrência</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="forma_ingresso" id="cotas" value="cotas" required {{old('forma_ingresso') == 'cotas' ? 'checked' : ''}}>
				<label class="form-check-label" for="cotas">Cotas</label>
			</div>

			@if ($errors->has('forma_ingresso'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ 'selecione uma opção válida !!' }}</strong>
				</span>
			@endif	

		</div>
	</div>
	<div class="col col-6 col-md-3">
		<div class="form-group">
			<label for="tipo-cota">Qual (caso seja cotas)</label>
			<input type="text" class="form-control {{$errors->has('tipo_cotas') ? 'is-invalid': ''}}" maxlength="63" name="tipo_cotas" placeholder="Qual o tipo de cotas" id="tipo-cota" value="{{old('tipo_cotas')}}">

			@if ($errors->has('tipo_cotas'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('tipo_cotas') }}</strong>
				</span>
			@endif	

		</div>
	</div>
	<div class="col col-12 col-md-3">
		<div class="form-group">
			<label for="semestre-ingresso">Semestre de ingresso *</label>
			<input type="text" class="form-control semestre-mask {{$errors->has('semestre_ingresso') ? 'is-invalid' : ''}}" maxlength="15" name="semestre_ingresso" placeholder="Qual o semestre de ingresso" id="semestre-ingresso" required value="{{old('semestre_ingresso')}}">

			@if ($errors->has('semestre_ingresso'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('semestre_ingresso') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-6">
		<div class="form-group">
			<label for="cursos-concluidos">Cursos concluídos<br/>(graduação ou técnico)</label>
			<input type="text" class="form-control {{$errors->has('cursos_concluids') ? 'is-invalid' : ''}}" maxlength="127" name="cursos_concluidos" placeholder="Digite os cursos concluídos" id="cursos-concluidos" value="{{old('cursos_concluidos')}}">

			@if ($errors->has('cursos_concluidos'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('cursos_concluidos') }}</strong>
				</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-6">
		<div class="form-group">
			<label for="cursos-em-andamento">Cursos não concluídos ou em andamento<br/>(graduação ou técnico)</label>
			<input type="text" class="form-control" maxlength="127" name="cursos_em_andamento" placeholder="Digite os cursos concluídos" id="cursos-em-andamento" value="{{old('cursos_em_andamento')}}">

			@if ($errors->has('cursos_em_andamento'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('cursos_em_andamento') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>