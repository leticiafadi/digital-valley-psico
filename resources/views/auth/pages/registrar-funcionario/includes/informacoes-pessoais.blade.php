<div>
    <div class="text-center">
        <h3>Informações pessoais</h3>
    </div>
</div>
<div class="row">
	<div class="col col-12">
		<div class="form-group">
			<label for="nome">Nome *</label>
			<input type="text" class="form-control {{$errors->has('nome') ? 'is-invalid' : ''}}" value="{{old('nome')}}" id="nome" placeholder="Nome completo" name="nome" v-model="nome" maxlength="191" v-on:input="validaInformacoesPessoais()"  required>
			
			@if ($errors->has('nome'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('nome') }}</strong>
				</span>
			@endif
		
		</div>
	</div>
</div>
<div class="row">
	<div class="col col-3">
	<label for="">Gênero *</label>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="genero" id="genero-masculino" value="m" {{old('genero') == 'm'  ? 'checked' : ''}}   v-model="genero" v-on:change="validaInformacoesPessoais()" required>
				<label class="form-check-label" for="genero-masculino">Masculino</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="genero" id="genero-feminino" value="f"   {{old('genero') == 'f' ? 'checked' : ''}} v-model="genero"  v-on:change="validaInformacoesPessoais()" required>
				<label class="form-check-label" for="genero-feminino">Feminino</label>
			</div>

			@if ($errors->has('auxilio'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ "Marque uma opção válida !!" }}</strong>
				</span>
			@endif
			
		</div>
	</div>
	<div class="col col-9">
		<div class="form-group">
			<label for="nascimento">Data de nascimento *</label>
			<input type="text" class="form-control {{$errors->has('data_nascimento') ? 'is-invalid' : ''}} date-mask" id="nascimento" name="data_nascimento"  value="{{old('data_nascimento')}} "  v-on:input="setDataNascimento()" >

			@if ($errors->has('data_nascimento'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('data_nascimento') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="col col-12">
		<div class="fa-pull-right">
			<button type="button" class="btn btn-primary btn-lg" :disabled="!informacoesPessoaisIsValid" v-on:click="mudaAba('informacoesProfissionais')">Próximo <i class="fa fa-chevron-right"></i></button>
		</div>
	</div>
</div>