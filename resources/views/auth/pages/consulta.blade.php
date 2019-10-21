@extends('auth.layouts.layout-basic')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col col-12">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-calendar"></i>
						<span>Atendimentos</span>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="myTable">
								<thead class="mynav">
									<tr>
										<th class="corLinhaTabela">
											Nome
										</th>
										<th class="corLinhaTabela">
											Matricula
										</th>
										<th class="corLinhaTabela">
											Curso
										</th>
										<th class="corLinhaTabela">
											Data & horário do pedido
										</th>
										<th class="corLinhaTabela">
											Opções
										</th>
									</tr>
								</thead>
								<tbody>
									@if(!empty($consultas))
										@foreach($consultas as $consulta)
											<tr class="{{ $consulta->visualizado == 1 ? 'bg-light' : ''}}">
												<td>{{$consulta->nome}}</td>
												<td>
													{{$consulta->matricula}}
												</td>
												<td>
													{{$consulta->curso_atual}}
												</td>
												<td>
												{{date('d/m/Y h:m', strtotime($consulta->created_at))}}
												</td>
												<td>
												<a href=" {{route('consulta.visualizar', $hashVisualizar->encode($consulta->id))}} " class="btn btn-primary fa-pull-right">Ver detalhes</a>
												<a href=" {{route('consulta.excluir', $hashVisualizar->encode($consulta->id))}}  "><i class="fas fa-trash text-danger"></i> </a>
												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection