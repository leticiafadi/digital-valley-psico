@extends('auth.layouts.layout-basic')
@section('content')

	<div class="container">
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col col-12">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-calendar"></i>
						<span>Atendimento</span>
					</div>
					<div class="card-body">
						@if($consulta)
							{{$consulta->horariosDisponiveis}}
							@include('auth.pages.item-consulta.includes.informacoes-pessoais')
							<hr>
							@include('auth.pages.item-consulta.includes.informacoes-academicas')
							<hr>
							@include('auth.pages.item-consulta.includes.vinculo')
							<hr>
							@include('auth.pages.item-consulta.includes.situacao')
							<hr>
							@include('auth.pages.item-consulta.includes.horarios')
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection