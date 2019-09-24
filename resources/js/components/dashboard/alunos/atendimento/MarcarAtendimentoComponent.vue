<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-calendar"></i>
                        Marcar atendimento 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="motivoAtendimento">Motivo do atendimento</label>
                                    <input type="text" name="motivoAtendimento" placeholder="EX: Não estou conseguindo conciliar os meus horários da faculdade">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="data-atendimento">Selecione a data</label>
                                    <vue-calendar id="data-atendimento" format="dd/MM/yyyy" :language="pt" placeholder="Selecione a data do atendimento" v-model="dataAtendimento" ></vue-calendar>
                                </div>
                            </div>
                            <div class="col col-4">
                                <label for="motivoAtendimento">Selecione o psicólogo para o atendimento</label>
                                <select name="id_curso" class="form-control">
                                        <option value="">Selecione um psicólogo</option>
                                        <!--<option v-for="psicologo in p" v-bind:value="curso.id">{{curso.nome}}</option>-->
                                </select>    
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="horarios-atendimento">Selecione o horário de atendimento</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Selecione o horário de atendimento</option>
                                        <option value="" v-for="horario in horariosDisponiveis">{{horario}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col col-12">
                                <div class="fa-pull-right">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                            Marcar atendimento
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
    import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
    export default {
        components:{
            VueCalendar,
            ptBR
        },
        data: function(){
            return{
                pt:ptBR,
                dataAtendimento: '',
                horariosDisponiveis: []
            }
        },
        methods:{
            carregaHorarios: function(){
                this.horariosDisponiveis = [1,2,3];
            }
        },
        mounted(){
            this.carregaHorarios();
        }
    }
</script>

<style>
    #data-atendimento{
        padding: 5px;
        width: 100%;
    }

    input{
	width: 100%;
	padding: 5px;
    }

</style>