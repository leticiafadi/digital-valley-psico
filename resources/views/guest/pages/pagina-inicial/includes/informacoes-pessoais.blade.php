<div class="row">

	<div class="col col-12">
		<h3>Identificação pessoal</h3>
	</div>

</div>

<div class="row">
	<div class="col col-12">
		<div class="form-group">
			<label for="nome">Nome *</label>
			<input type="text" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" id="nome" placeholder="Nome completo" name="nome" maxlength="255" value="{{old('nome')}}" required>

			@if ($errors->has('nome'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('nome') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-6 ">


		<label for="nascimento">Data de nascimento *</label>
		<input type="text" class="form-control date-mask {{$errors->has('data__de_nascimento') ? 'is-invalid' : ''}}" id="nascimento" name="data_de_nascimento"  value="{{old('data_de_nascimento')}}"  minlength="10" required>

		@if ($errors->has('data_nascimento'))

			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('data_nascimento') }}</strong>
			</span>
		@endif



	</div>
	<div class="col col-12 col-md-6 ">
		<div class="form-group">
			<label for="naturalidade">Naturalidade *</label>
			<input type="text" class="form-control {{$errors->has('naturalidade') ? 'is-invalid' : ''}}" id="naturalidade" placeholder="Cidade de origem" name="naturalidade" maxlength="255" required value="{{old('naturalidade')}}">

			@if ($errors->has('naturalidade'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('naturalidade') }}</strong>
				</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-4">
		<div class="form-group">
			<label for="estado-civil">Estado civil *</label>
			<input type="text" id="estado-civil" class="form-control {{$errors->has('estado_civil') ?'is-invalid' : ''}}" placeholder="Informe seu estado civil" name="estado_civil" maxlength="63" required value="{{old('estado_civil')}}">

			@if ($errors->has('estado_civil'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('estado_civil') }}</strong>
				</span>
			@endif	

		</div>
	</div>
	<div class="col col-4 col-md-2">
		<label for="">Possui filhos *</label>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="filhos" id="nao-possui-filhos" value="nao" required {{old('filhos') == 'nao' ? 'checked' : ''}}>
				<label class="form-check-label" for="nao-possui-filhos">Não</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="filhos" id="possui-filhos" value="sim" {{old('filhos') == 'sim' ? 'checked' : ''}}>
				<label class="form-check-label" for="possui-filhos">Sim</label>
			</div>

			@if ($errors->has('filhos'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ 'Marque uma opção !' }}</strong>
			</span>
			@endif

		</div>
	</div>
	<div class="col col-8 col-md-3">
		<div class="form-group">
			<label for="reside-com">Reside com *</label>
			<select class="custom-select {{$errors->has('reside_com') ? 'is-invalid' : ''}}" id="reside-com" name="reside_com" required>
				<option {{old('reside_com') == '' ? 'selected' : ''}} value="">Selecione uma opção</option>
				<option {{old('reside_com') == 'sozinho' ? 'selected' : ''}} value="sozinho">Sozinho</option>
				<option {{old('reside_com') == 'familiares' ? 'selected' : ''}} value="familiares">Familiares</option>
				<option {{old('reside_com') == 'amigos' ? 'selected' : ''}} value="amigos">Amigos</option>
				<option {{old('reside_com') == 'parentes' ? 'selected' : ''}} value="parentes">Parentes</option>
				<option {{old('reside_com') == 'outros' ? 'selected' : ''}} value="outros">Outros</option>
			</select>

			@if ($errors->has('reside_com'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ 'Marque uma opção !' }}</strong>
			</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-3">
		<div class="form-group">
			<label for="reside-com-outros">Reside com outros </label>
			<input type="text" id="reside-com-outros" name="reside_com_outros" class="form-control {{$errors->has('reside_com_outros') ? 'is-invalid' : ''}}" placeholder="Com quem reside" value="{{old('reside_com_outros')}}" maxlength="31">

			@if ($errors->has('reside_com_outros'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('reside_com_outros') }}</strong>
			</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12 col-md-6">
		<div class="form-group">
			<label for="endereco">Endereço *</label>
			<input type="text" id="endereco" class="form-control {{$errors->has('endereco' ? 'is-invalid' : '')}}" placeholder="Digite aqui seu endereço" required name="endereco" maxlength="127" value="{{old('endereco')}}">


			@if ($errors->has('endereco'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('endereco') }}</strong>
			</span>
			@endif

		</div>
	</div>
	<div class="col col-12 col-md-6">
		<div class="form-group">
			<label for="email">E-mail *</label>
			<input type="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Digite aqui seu endereço de E-mail" required name="email" maxlength="127" value="{{old('email')}}">

			@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif

		</div>
	</div>
</div>
<div class="row">
	<div class="col-12 col-md-4">
		<div class="form-group">
			<label for="telefone-celular">Telefone celular *</label>
			<input type="text" id="telefone-celular" class="form-control telefone-celular-mask {{$errors->has('telefone_celular') ? 'is-invalid' : ''}}" placeholder="Informe o celular" maxlength="15" name="telefone_celular" required value="{{old('telefone_celular')}}">

			@if ($errors->has('telefone_celular'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('telefone_celular') }}</strong>
			</span>
			@endif

		</div>
	</div>
	<div class="col-12 col-md-4">
		<div class="form-group">
			<label for="telefone-residencial">Telefone residencial</label>
			<input type="text" id="telefone-residencial" class="form-control telefone-residencial-mask {{$errors->has('telefone_residencial' ? 'is-invalid' : '')}}" placeholder="Informe o telefone" maxlength="15" name="telefone_residencial" value="{{old('telefone_residencial')}}">
			
			@if ($errors->has('telefone_residencial'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('telefone_residencial') }}</strong>
			</span>
			@endif
			
		</div>
	</div>
	<div class="col-12 col-md-4">
		<div class="form-group">
			<label for="telefone-outros">Outro telefone de contato</label>
			<input type="text" id="telefone-outros" class="form-control telefone-residencial-mask {{$errors->has('telefone_outros') ? 'is-invalid' : ''}}" placeholder="Informe outros telefones" maxlength="15" name="telefone_outros" value="{{old('telefone_outros')}}">
			
			@if ($errors->has('telefone_outros'))
			<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('telefone_outros') }}</strong>
			</span>
			@endif
			
		</div>
	</div>
</div>