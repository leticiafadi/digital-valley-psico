<div>
    <div class="text-center">
        <h3>Informações profissionais</h3>
    </div>
</div>
<div class="row">
    <div class="col col-12 col-md-6">
        <div class="form-group">
            <label for="siape">Siape *</label>
            <input type="text" name="siape" class="form-control {{$errors->has('siape') ? 'is-invalid' : ''}}  siape-mask" id="siape" placeholder="Siape do funcionário" v-on:input="setSiape()">

            @if ($errors->has('siape'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('siape') }}</strong>
				</span>
			@endif

        </div>
    </div>
    <div class="col col-12 col-md-6">
        <div class="form-group">
            <label for="crp">CRP *</label>
            <input type="text" name="crp" class="form-control {{$errors->has('crp') ? 'is-invalid' : ''}} crp-mask" id="crp" placeholder="Crp do funcionário" value="{{old('crp')}}" v-on:input="setCrp()">
            @if ($errors->has('crp'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('crp') }}</strong>
				</span>
			@endif
        </div>
    </div>
</div>
<hr>
<div class="row">
	<div class="col col-12">
		<div class="fa-pull-right">
			<button type="button" class="btn btn-primary btn-lg" :disabled="!informacoesProfissionaisIsValid" v-on:click="mudaAba('localizacaoEContato')">Próximo <i class="fa fa-chevron-right"></i></button>
		</div>
	</div>
</div>
