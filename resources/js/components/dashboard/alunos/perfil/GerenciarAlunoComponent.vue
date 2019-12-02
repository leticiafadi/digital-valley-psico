<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-user  pr-2 mycolor-azul"></i>
                        Gerenciar perfil Aluno
                    </div>
                    <div class="card-body">
                        <infopessoal-aluno   :aluno="this.aluno"> </infopessoal-aluno>
                        <infoacademica-aluno :aluno="this.aluno"> </infoacademica-aluno>
  

                       <!-- <vinculo-ufc> </vinculo-ufc>

                        <situacao-programa> </situacao-programa>-->

                    <!--<div class="card-body">
                        <div class="row">
                            <div class="col col-12">
                                <div class="fa-pull-right">
                                    <button v-show="this.estadoCivil != ''" type="submit" class="btn btn-primary btn-lg">
                                            Salvar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <h2>Observações</h2>
                                </div>
                            </div>
                            <div class="table table-responsive">
							    <table class="table table-bordered" id="myTable">
								<thead>
									<tr>
										<th class="mybg-azul">
											Observações
										</th>
										<th class="mybg-azul">
											Data
										</th>
										<th class="mybg-azul">
											Opção
										</th>
									</tr>
								</thead>
								<tbody>
                                    <tr>
                                        <td>
                                            Sem Observações Cadastradas
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                            <button type="button" class="btn mybtn-table btn-danger py-1 px-4 fa-pull-right" data-toggle="modal" data-target="#modalExemplo">
                                                Excluir
                                            </button>
                                            </div>							
                                        </td>
                                    </tr>
								</tbody>
							</table>
                            <div v-show="state==1">
                            <textarea class="form-control" name="" id="" cols="50" rows="5" :focus="state" placeholder="Digite a nova Obervação"></textarea>
                            &nbsp;
                            <div class="d-flex justify-content-center">
                                <button type="button" @click="State()" class="btn mybtn-table btn-danger py-1 px-4 fa-pull-right" >
                                    Incluir
                                </button>
                            </div>
                            </div>
                            <button v-show="state==0" class="btn mybtn-table py-0 px-2 fa-pull-right" @click="State()"> Incluir Nova Observação</button>
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
						
									    </div>
									    <div class="modal-footer">
									    <button type="button" class="btn mybtn-table py-1 px-4" data-dismiss="modal">Não, me arrependi</button>
									    <a href="" class="btn mybtn-table py-1 px-4">Sim, desejo excluir</a>
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
    </div>
</template>

<script>
    import axios    from 'axios';
    import VueCalendar  from 'vuejs-datepicker' 
    import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
    
    export default {
        components:{
            axios,
            VueCalendar,
            ptBR
        },
        props:{
            base_url: String,
            aluno: Object
        },
        data: function(){
            return{
                state: 0
            }
        },
        methods:{
            State(){
                if (this.state==0) {
                    this.state=1;
                    return true;
                }else{
                    this.state = 0;
                    return false;
                }

            }
        },
        mounted(){
            
        }
    }
</script>

