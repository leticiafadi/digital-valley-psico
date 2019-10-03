<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col col-12">

                <div class="card">
                    <div class="card-header">
                        Gerenciar horários
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Selecione o ano e a semana.</h5>
                        </div>
                        <div class="container mt-3">
                            <div class="row">
                                <div class="col col-6">
                                    <select id="" class="form-control" v-model="anoSelecionado">
                                        <option value="">Selecione o ano</option>
                                        <option value="" v-for="ano in anos" v-bind:value="ano">{{ano}}</option>
                                    </select>
                                </div>
                                <div class="col col-6">
                                    <select name="" id="" class="form-control" v-model="semanaSelecionada">
                                        <option value="" >Selecione uma semana</option>
                                        <option value="" v-for="(semana, idx) in semanas" v-bind:value="'Semana '  + (idx+ 1) +  ' de ' + formatarData(semana.inicio) + ' até ' + formatarData(semana.final)">Semana {{idx + 1}} de {{formatarData(semana.inicio)}} até {{formatarData(semana.final)}} </option>
                                    </select>
                                    
                                </div>

                            </div>

                            <div class="col col-12">

                                <div v-if="this.anoSelecionado != '' && this.semanaSelecionada != ''">
                                    <div class="mt-4 mb-4">
                                        {{this.semanaSelecionada}} do ano de {{this.anoSelecionado}}
                                    </div>
                                

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Horas/Dias</th>
                                                    <th v-for="dia in dias">{{formatarDiaSemana(dia)}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                               
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col col-12">
                                            <div class="fa fa-pull-right">
                                                <button class="btn btn-primary btn-lg">Salvar</button>
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
    </div>
</template>

<script>
    import Moment from 'moment';
    import axios from 'axios';
    export default {
        data: function(){
            return {
                horas : [
                    "08:00-09:00", 
                    "09:00-10:00", 
                    "10:00-11:00", 
                    "11:00-12:00",
                    "13:30-14:30",
                    "14:30-15:30",
                    "15:30-16:30",
                    "16:30-17:30",
                ],
                anos : [],
                data : new Date(),
                semanas : [],
                dias    : [],
                anoSelecionado : '',
                semanaSelecionada : ''
            }
        },
        watch:{
            anoSelecionado : "carregaSemanas"
        },
        methods:{
             formatarData: function(date) {
        		return Moment(date).format('  DD/MM  ');
            },
            formatarDiaSemana: function(date){
                //formata o dia que aparece na tabela
        		return Moment(date.dia).lang('pt-br').format(' ddd DD/MM  ');
            },
            carregaSemanas: function(){

                if(this.anoSelecionado == ''){
                    this.semanas = [];
                    return 0;
                }
                //zerar as semanas
                this.semanas = [];
                const dia = 1000*60*60*24;
                //primeiro dia do ano
                var primeiro = new Date( this.anoSelecionado + '-01-02');
                //primeira segunda feira
                while(Moment(primeiro).format('dddd') != 'Monday')            
                    primeiro = new Date(primeiro.getTime() - dia);
                    

                //pega cada semana ate 15 dias após o dia de hoje
                while(primeiro < new Date(new Date().getTime() + dia * 20)){
                    this.semanas.push({inicio : primeiro, final : new Date(primeiro.getTime() + dia * 4)});
                    primeiro = new Date(primeiro.getTime() + dia*7);
                }
            },
            carregaAnos : function(){
                var hoje = new Date();
                var anoAtual = parseInt(Moment(hoje).format('YYYY'));

                for(var i = 2019; i <= anoAtual; i++){
                    this.anos.push(i);
                }

            },
            carregaSemana: function(ano, semana){
                axios.get('http://localhost:8000/horarios/2019/27').then(res=>{
                    this.dias = res.data;
                }).catch(err=>{
                    window.alert(JSON.stringify(err));
                });
            }   
        },
        mounted(){
            this.carregaAnos();
            this.carregaSemana(873804,7483721);
        }
        
    }
</script>

<style>
    thead th{
        text-align: center;
    }
    div.icheck-primary {
        text-align:center

    }
</style>
