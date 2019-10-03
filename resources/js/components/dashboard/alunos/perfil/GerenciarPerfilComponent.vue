<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-user"></i>
                        Gerenciar perfil 
                    </div>

                        <informacoes-pessoais> </informacoes-pessoais>

                        <informacoes-academicas> </informacoes-academicas>

                       <!-- <vinculo-ufc> </vinculo-ufc>

                        <situacao-programa> </situacao-programa>-->

                    <div class="card-body">
                        <div class="row">
                            <div class="col col-12">
                                <div class="fa-pull-right">
                                    <button v-show="this.estadoCivil != ''" type="submit" class="btn btn-primary btn-lg">
                                            Salvar
                                    </button>
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
    import VueCalendar  from 'vuejs-datepicker' 
    import InformacoesPessoais from './includes/InformacoesPessoaisComponent.vue'
    import InformacoesAcademicas from './includes/InformacoesAcademicasComponent.vue'
    import VinculoUfc from './includes/VinculoUfcComponent.vue'
    import SituacaoPrograma from './includes/SituacaoProgramaComponent.vue'
    import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
    export default {
        components:{
            VueCalendar,
            ptBR,
            InformacoesPessoais,
            InformacoesAcademicas,
            VinculoUfc,
            SituacaoPrograma
        },
        data: function(){
            return{
                
            }
        },
        methods:{
            
        }
    }
</script>

