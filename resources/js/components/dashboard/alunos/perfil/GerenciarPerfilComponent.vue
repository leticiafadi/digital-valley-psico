<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-user  pr-2 mycolor-azul"></i>
                        Gerenciar perfil 
                    </div>

                        <informacoes-pessoais   :aluno="this.aluno"> </informacoes-pessoais>
                        <informacoes-academicas :aluno="this.aluno"> </informacoes-academicas>

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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios    from 'axios';
    import VueCalendar  from 'vuejs-datepicker' 
    import InformacoesPessoais from './includes/InformacoesPessoaisComponent.vue'
    import InformacoesAcademicas from './includes/InformacoesAcademicasComponent.vue'
    import VinculoUfc from './includes/VinculoUfcComponent.vue'
    import SituacaoPrograma from './includes/SituacaoProgramaComponent.vue'
    import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
    
    export default {
        components:{
            axios,
            VueCalendar,
            ptBR,
            InformacoesPessoais,
            InformacoesAcademicas,
            VinculoUfc,
            SituacaoPrograma
        },
        props:{
            base_url: String,
            id_aluno: Number,
        },
        data: function(){
            return{
                aluno: []
            }
        },
        methods:{
            carregaAluno: function(){
                if(this.tipo==1){
                    axios.get( this.base_url + '/alunos/'+this.id_aluno).then(response=>{
                    this.aluno = response.data;
                });
                }else{
                    axios.get( this.base_url + '/info/'+this.id_aluno).then(response=>{
                        this.aluno = response.data;
                    });
                }
            }
        },
        mounted(){
            this.carregaAluno();
        }
    }
</script>

