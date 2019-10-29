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
            }
        },
        methods:{
            
        },
        mounted(){
            
        }
    }
</script>

