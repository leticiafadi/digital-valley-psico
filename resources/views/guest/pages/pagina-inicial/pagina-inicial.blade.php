@extends('guest.layouts.layout-basic')

@section('content')

	<!-- Aqui tera o formulario, mais podera mudar de local-->
	<div class="container">

		<div class="row">
			<div class="col col-12">
				<div class="card mt-4 mb-4">
					<div class="card-header">
						<i class="fas fa-calendar"></i>&nbsp;
						<span>Agende aqui seu atendimento</span>
					</div>
					<div class="card-body">
						@include('guest.pages.pagina-inicial.includes.formulario')
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection