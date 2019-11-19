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
                        
                    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <h2>Observações Gerais</h2>
                        </div>                        
                        <div class="table-responsive">
                            <table class="table table-bordered" >
                                <thead class="mynav">
                                    <tr>
                                        <th class="corLinhaTabela">
                                            Observação
                                        </th>
                                        <th class="corLinhaTabela">
                                            Data
                                        </th>
                                        <th class="corLinhaTabela">
                                            Opções
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Adicionar as informações da Observação</strong>
                                        </td>
                                        <td>
                                            <strong>Adicionar a data do Atendimento</strong>
                                        </td>
                                        <td>
                                            <div class="col col-12 d-flex justify-content-center">
                                                <button class="btn mybtn-table btn-danger py-1 px-4" >Excluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-show="this.status == 1">
                                    <tr>
                                        <td>
                                            <div class="col col-12 d-flex justify-content-center">
                                                <textarea class="area" rows="5" cols="33" placeholder="Digite a observação aqui"></textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col col-12 d-flex justify-content-center">
                                                <button @click="trocaStatus()" class="btn mybtn-table btn-danger py-1 px-4" >Incluir</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="fa-pull-right">
                                <button v-show="this.status == 0" @click="trocaStatus()" type="submit" class="btn mybtn-table btn-danger py-1 px-4">
                                        Incluir nova observação
                                </button>
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
                status: 0
            }
        },
        methods:{
            trocaStatus(){
                if(this.status == 0){
                    this.status = 1;
                }else{
                    this.status = 0;
                }
            }
        },
        mounted(){
            
        }
    }
</script>

