@extends('auth.layouts.layout-basic')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col col-12">
				<div class="card">
					<div class="card-header">
						<i class="fa fa-calendar pr-2 mycolor-azul"></i>
						<span>Atendimentos</span>
					</div>
					<div class="card-body">
						<div class="table table-responsive">
							<table class="table table-bordered" id="myTable">
								<thead>
									<tr>
										<th class="mybg-azul">
											Nome
										</th>
										<th class="mybg-azul">
											Matricula
										</th>
										<th class="mybg-azul">
											Curso
										</th>
										<th class="mybg-azul">
											Data & horário do pedido
										</th>
										<th class="mybg-azul">
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
												<a href=" {{route('consulta.excluir', $hashVisualizar->encode($consulta->id))}}  "><i class="fas fa-trash text-danger"></i> </a>
												<a href=" {{route('consulta.visualizar', $hashVisualizar->encode($consulta->id))}} " class="btn mybtn-table py-1 px-4 fa-pull-right">Ver detalhes</a>
								
												
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

