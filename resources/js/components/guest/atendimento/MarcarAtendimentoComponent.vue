<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        Marcar atenidmento 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="data-atendimento">Selecione a data</label>
                                    <vue-calendar id="data-atendimento" format="dd/MM/yyyy" :language="pt" placeholder="Selecione a data do atendimento" v-model="dataAtendimento" ></vue-calendar>
                                </div>
                                {{dataAtendimento}}
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="horarios-atendimento">Selecione o horário de atendimento</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Selecione o horário de atendimento</option>
                                        <option value="" v-for="horario in horariosDisponiveis">{{horario}}</option>
                                    </select>
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
        watch:{
            dataAtendimento : 'carregaHorarios'
        },
        methods:{
            carregaHorarios: function(){
                this.horariosDisponiveis = [1,2,3];
            }
        }
    }
</script>

<style>
    #data-atendimento{
        background-color: #ffffff;
        border: solid 1px #ccc;
        border-radius: 4px;
        padding: 5px;
        width: 100%;
    }
</style>