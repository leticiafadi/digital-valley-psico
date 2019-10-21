<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-home"></i>
			            Gerenciar atendimentos
                    </div>
                    <div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" >
								<thead>
									<tr>
										<th>
											Atendimento
										</th>
										<th>
											Data & horário do Atendimento
										</th>
										<th>
											Opções
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        <td>
                                            <strong>Adicionar as informações do Atendimento</strong>
                                        </td>
                                        <td>
                                            <strong>Adicionar a data do Atendimento</strong>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary fa-pull-right" @click="mostrarDetalhes()">Ver mais</button>
											<button @click="cancelarAtendimento()" class="btn btn-danger" :disabled="!this.isValid()" >Cancelar</button>
                                        </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios    from 'axios';
    import Snotify  from 'vue-snotify';
    import VeeValidate from 'vee-validate';
    export default {
        props:{
            baseUrl: String
        },
        components:{
            axios,
            Snotify
        },
        data: function(){
            return{
                atendimento_selecionado : -1,
                indexAtendimentoSelecionado : -1,
                atendimentos: [],

            }
        },
        methods:{
            cancelarAtendimento: function(){

            },
            mostrarDetalhes: function(){

            },
            carregaAtendimentos: function(){
                axios.get().then(response => {
                    this.atendimentos = response.data;
                });
            },
            isValid: function(){
                
            }
        },
        mounted(){
            this.carregaAtendimentos();
        }
    }
</script>