<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-calendar pr-2 mycolor-azul"></i>
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
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="motivoAtendimento">Psicólogo responsável</label>
                                    <select name="id_curso" class="form-control">
                                            <option value="">Selecione um psicólogo</option>
                                            <!--<option v-for="psicologo in p" v-bind:value="curso.id">{{curso.nome}}</option>-->
                                    </select>    
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="data-atendimento">Data de atendimento</label>
                                    <!--<vue-calendar id="data-atendimento" format="dd/MM/yyyy" :language="pt" placeholder="Selecione a data do atendimento" v-model="dataAtendimento" ></vue-calendar>-->
                                    <datetime id="data-atendimento" v-model="dataAtendimento" format="dd/MM/yyyy" input-class="form-control" placeholder="Selecione a data do atendimento"></datetime>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="horarios-atendimento">Horário de atendimento</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Selecione o horário de atendimento</option>
                                        <option value="" v-for="horario in horariosDisponiveis">{{horario}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="horarios-atendimento">Encaminhado por</label>
                                    <select name="formaEncaminhamento" id="" class="form-control" v-model="motivoEncaminhamento">
                                        <option @click="limpaMotivo()" value="">Selecione a forma de encaminhamento</option>
                                        <option @click="limpaMotivo()" value="espontaneo">Espontânea vontade</option>
                                        <option value="recomendado">Outro motivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" v-show="motivoEncaminhamento == 'recomendado'">
                                <div class="form-group">
                                    <label for="motivoEncaminhamento">Descreva quem o encaminhou</label>
                                    <input type="text" name="motivoEncaminhamento" placeholder="EX: encaminhado pela psicóloga" v-model="textMotivoEncaminhamento">
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
                horariosDisponiveis: [],
                motivoEncaminhamento: '',
                textMotivoEncaminhamento: ''
            }
        },
        methods:{
            carregaHorarios: function(){
                this.horariosDisponiveis = [1,2,3];
            },
            limpaMotivo: function(){
                this.textMotivoEncaminhamento = '';
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