<div>
    <div class="text-center">
        <h3>Dados confidenciais</h3>
    </div>
</div>
<div class="row">
    <div class="col col-md-6 col-12">
        <div class="form-group">
            <label for="senha">Digite sua senha</label>
            <input type="password" class="form-control" placeholder="Digite a sua senha" name="senha" v-model="senha" v-on:input="validaSenha()">
        </div>
    </div>
    <div class="col col-md-6 col-12">
        <div class="form-group">
            <label for="repete-senha">Repita a senha</label>
            <input type="password" class="form-control" placeholder="Repita a sua senha" name="repete_senha" v-model="repeteSenha" v-on:input="validaSenha()">
        </div>
    </div>
</div>
<div class="row">
	<div class="col col-12">
		<div class="fa-pull-right">
			<button type="submit" class="btn btn-primary btn-lg" :disabled="!dadosConfidenciaisIsValid">Cadastrar <i class="fa fa-plus"></i></button>
		</div>
	</div>
</div>