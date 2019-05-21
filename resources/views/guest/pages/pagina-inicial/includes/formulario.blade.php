<form action=" {{route('consulta.marcar')}} " method="post">

	{{ csrf_field() }}
	
	
	@include('guest.pages.pagina-inicial.includes.informacoes-pessoais')
	<hr>
	@include('guest.pages.pagina-inicial.includes.formacao')
	<hr>
	@include('guest.pages.pagina-inicial.includes.vinculo')
	<hr>
	@include('guest.pages.pagina-inicial.includes.situacao')
	<hr>
	@include('guest.pages.pagina-inicial.includes.dias-disponiveis')
	<hr>
	
	<div class="row">
		
		
	
		<div class="col col-12 col-md-4">
			{{Captcha::img()}}
			<div class="form-group mt-1">
				<label for="captcha">Digite o código acima*</label>
				<input type="text" class="form-control" name="captcha" required minlength="1">
			</div>
			


			<h6>Campos com * são obrigatórios.</h6>
		</div>

		<div class="col col-12">
			<button class="btn-block btn btn-primary btn-lg">Enviar dados</button>
		</div>

	</div>

</form>