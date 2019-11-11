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
											Matrícula
										</th>
										<th class="mybg-azul">
											Curso
										</th>
										<th class="mybg-azul">
											Data e horário do pedido
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
												<button type="button" class="btn mybtn-table btn-danger py-1 px-4" data-toggle="modal" data-target="#modalExemplo">
													Excluir
												</button>
												<a href=" {{route('consulta.visualizar', $hashVisualizar->encode($consulta->id))}} " class="btn mybtn-table py-1 px-4 fa-pull-right">Ver detalhes</a>									
												
												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>

							<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer excluir esse atendimento ?</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
									...
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Não, me arrependi</button>
									<a href=" {{route('consulta.excluir', $hashVisualizar->encode($consulta->id))}} " class="btn mybtn-table py-1 px-4">Sim, desejo excluir</a>
									</div>
								</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
