<div>
    <div class="text-center">
        <h3>Localizacao e contato</h3>
    </div>
</div>
<div class="row">
    <div class="col col-12 col-md-4">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Selecione um pais</label>
            <select class="form-control" id="" v-on:change="carregaEstados()" v-model="idPais">
                <option value="" selected>Selecione um pais</option>
                @foreach($paises as $pais)
                    <option value="{{$pais->id}}">{{$pais->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col col-12 col-md-4">
        <div class="form-group">
            <label for="">Selecione seu estado/região</label>
            <select class="form-control" id="" v-on:change="carregaCidades()" v-model="idEstado">
                <template v-for="estado of estados">
                    <option v-bind:value="estado.id">@{{ estado.name }}</option>
                </template>
            </select>
        </div>
    </div>
    <div class="col col-12 col-md-4">
        <div class="form-group">
            <label for="id-cidade">Selecione sua Cidade</label>
            <select class="form-control {{$errors->has('id_cidade') ? 'is-invalid' : ''}}" id="id-cidade" name="id_cidade" v-model="idCidade" v-on:change="validaLocalizacaoEContato()">
                <template v-for="cidade of cidades">
                    <option v-bind:value="cidade.id">@{{ cidade.name }}</option>
                </template>
            </select>

            @if ($errors->has('id_cidade'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('id_cidade') }}</strong>
				</span>
			@endif

        </div>
    </div>
</div>
<div class="row">
    <div class="col col-12 col-md-6">
        <div class="form-group">
            <label for="endereco">Endereço *</label>
            <input type="text" class="form-control {{$errors->has('endereco') ? 'is-invalid' : ''}}" name="endereco" id="endereco" value="{{old('endereco')}}" placeholder="Digite seu endereço" v-on:input="validaLocalizacaoEContato()" v-model="endereco" maxlength="63">

            @if ($errors->has('endereco'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('endereco') }}</strong>
				</span>
			@endif

        </div>
    </div>
    <div class="col col-12 col-md-3">
        <div class="form-group">
            <label for="bairro">Bairro *</label>
            <input type="text" class="form-control {{$errors->has('bairro') ? 'is-invalid' : ''}}" name="bairro" id="bairro" value="{{old('bairro')}}" placeholder="Digite seu bairro" v-on:input="validaLocalizacaoEContato()" v-model="bairro">
        </div>

            @if ($errors->has('bairro'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bairro') }}</strong>
                </span>
            @endif

    </div>
    <div class="col col-12 col-md-3">
        <div class="form-group">
            <label for="endereco">Número *</label>
            <input type="text" class="form-control {{$errors->has('numero') ? 'is-invalid' : ''}}" name="numero" id="numro" value="{{old('numero')}}" placeholder="Digite o número de seu endereço" v-on:input="validaLocalizacaoEContato()" v-model="numero">

            @if ($errors->has('numero'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('numero') }}</strong>
				</span>
			@endif

        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col col-12 col-md-4">
        <div class="form-group">
            <label for="">Endereço de E-mail *</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Digite um endereço de emal válido" v-on:input="validaLocalizacaoEContato()" v-model="email">
        </div>
    </div>
    <div class="col col-12 col-md-4">
        <div class="form-group">
            <label for="telefone-celular">Telefone celular *</label>
            <input type="text" id="telefone-celular" class="form-control telefone-celular-mask" name="telefone_celular" value="{{old('telefone_celular')}}" v-on:input="setTelefoneCelular()">
        </div>
    </div>
    <div class="col col-12 col-md-4">
        <div class="form-group">
            <label for="">Telefone</label>
            <input type="text" class="form-control telefone-residencial-mask" name="telefone_residencial" value="{{old('telefone_reidencial')}}">
        </div>
    </div>
</div>
<div class="row">
	<div class="col col-12">
		<div class="fa-pull-right">
			<button type="button" class="btn btn-primary btn-lg" :disabled="!localizacaoEContatoIsValid" v-on:click="mudaAba('dadosConfidenciais')">Próximo <i class="fa fa-chevron-right"></i></button>
		</div>
	</div>
</div>