<template>
    <div>
        <div class="container">

            <loading :active.sync="isLoading" 
                :can-cancel="false" 
                :is-full-page="true"></loading>
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
                                        <option value="" v-for="(semana, idx) in semanas" v-bind:value="idx+1">Semana {{idx + 1}} de {{formatarData(semana.inicio)}} até {{formatarData(semana.final)}} </option>
                                    </select>
                                    
                                </div>

                            </div>

                            <div class="col col-12">

                                <div v-if="this.anoSelecionado != '' && this.semanaSelecionada != ''">
                                    <div class="mt-4 mb-4">
                                        Semana {{this.semanaSelecionada}} do ano de {{this.anoSelecionado}}
                                    </div>
                                
                                    {{dias.segunda}}

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Horas/Dias</th>
                                                    <th v-for="dia in dias">{{formatarDiaSemana(dia)}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td colspan="6">
                                                    <div class="text-center">
                                                        Manhã
                                                    </div>
                                                  </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            08:00 - 09:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_a" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_a" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_a" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_a" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_a" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            09:00 - 10:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_b" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_b" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_b" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_b" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_b" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            10:00 - 11:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_c" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_c" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_c" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_c" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_c" id="">
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            11:00 - 12:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_d" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_d" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_d" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_d" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_d" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">
                                                        <div class="text-center">
                                                            Tarde
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            13:30 - 14:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_e" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_e" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_e" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_e" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_e" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            14:30 - 15:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_f" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_f" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_f" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_f" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_f" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            15:30 - 16:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_g" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_g" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_g" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_g" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_g" id="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            16:30 - 17:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_h" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_h" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_h" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_h" id="">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_h" id="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col col-12">
                                            <div class="fa fa-pull-right">
                                                <button class="btn btn-primary btn-lg" v-on:click="salvarSemana">Salvar</button>
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
    import Vue from 'vue';
    import VueSweetalert2 from 'vue-sweetalert2';
    import Loading from 'vue-loading-overlay';

    import 'vue-loading-overlay/dist/vue-loading.css';

    Vue.use(VueSweetalert2);
    Vue.use(Loading);

    export default {

        data: function(){
            return {
                isLoading: false,
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
                anoSelecionado : '',
                semanaSelecionada : '',
                dias:{
                   
                },
                segunda_a: false,
                segunda_b: false,
                segunda_c: false,
                segunda_d: false,
                segunda_e: false,
                segunda_f: false,
                segunda_g: false,
                segunda_h: false,

                terca_a: false,
                terca_b: false,
                terca_c: false,
                terca_d: false,
                terca_e: false,
                terca_f: false,
                terca_g: false,
                terca_h: false,

                quarta_a: false,
                quarta_b: false,
                quarta_c: false,
                quarta_d: false,
                quarta_e: false,
                quarta_f: false,
                quarta_g: false,
                quarta_h: false,

                quinta_a: false,
                quinta_b: false,
                quinta_c: false,
                quinta_d: false,
                quinta_e: false,
                quinta_f: false,
                quinta_g: false,
                quinta_h: false,

                sexta_a: false,
                sexta_b: false,
                sexta_c: false,
                sexta_d: false,
                sexta_e: false,
                sexta_f: false,
                sexta_g: false,
                sexta_h: false

            }
        },
        components: {
            Loading
        },
        watch:{
            anoSelecionado : "carregaSemanas",
            semanaSelecionada: "carregaSemana"
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

                this.isLoading = true;

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

                this.isLoading = false;

            },
            carregaAnos : function(){
                var hoje = new Date();
                var anoAtual = parseInt(Moment(hoje).format('YYYY'));

                for(var i = 2019; i <= anoAtual; i++){
                    this.anos.push(i);
                }

            },
            setarSemana: function(dias){


                console.log(dias);

                this.dias = dias;
                this.segunda_a  = dias[0].horarios[0] == 1;
                this.segunda_b  = dias[0].horarios[1] == 1;
                this.segunda_c  = dias[0].horarios[2] == 1;
                this.segunda_d  = dias[0].horarios[3] == 1;
                this.segunda_e  = dias[0].horarios[4] == 1;
                this.segunda_f  = dias[0].horarios[5] == 1;
                this.segunda_g  = dias[0].horarios[6] == 1;
                this.segunda_h  = dias[0].horarios[7] == 1;

                this.terca_a    = dias[1].horarios[0] == 1;
                this.terca_b    = dias[1].horarios[1] == 1;
                this.terca_c    = dias[1].horarios[2] == 1;
                this.terca_d    = dias[1].horarios[3] == 1;
                this.terca_e    = dias[1].horarios[4] == 1;
                this.terca_f    = dias[1].horarios[5] == 1;
                this.terca_g    = dias[1].horarios[6] == 1;
                this.terca_h    = dias[1].horarios[7] == 1;

                this.quarta_a    = dias[2].horarios[0] == 1;
                this.quarta_b    = dias[2].horarios[1] == 1;
                this.quarta_c    = dias[2].horarios[2] == 1;
                this.quarta_d    = dias[2].horarios[3] == 1;
                this.quarta_e    = dias[2].horarios[4] == 1;
                this.quarta_f    = dias[2].horarios[5] == 1;
                this.quarta_g    = dias[2].horarios[6] == 1;
                this.quarta_h    = dias[2].horarios[7] == 1;

                this.quinta_a    = dias[3].horarios[0] == 1;
                this.quinta_b    = dias[3].horarios[1] == 1;
                this.quinta_c    = dias[3].horarios[2] == 1;
                this.quinta_d    = dias[3].horarios[3] == 1;
                this.quinta_e    = dias[3].horarios[4] == 1;
                this.quinta_f    = dias[3].horarios[5] == 1;
                this.quinta_g    = dias[3].horarios[6] == 1;
                this.quinta_h    = dias[3].horarios[7] == 1;

                this.sexta_a    = dias[4].horarios[0] == 1;
                this.sexta_b    = dias[4].horarios[1] == 1;
                this.sexta_c    = dias[4].horarios[2] == 1;
                this.sexta_d    = dias[4].horarios[3] == 1;
                this.sexta_e    = dias[4].horarios[4] == 1;
                this.sexta_f    = dias[4].horarios[5] == 1;
                this.sexta_g    = dias[4].horarios[6] == 1;
                this.sexta_h    = dias[4].horarios[7] == 1;

            },   
            carregaSemana: function(){

                this.isLoading = true;

                this.$http.get('horarios/' + this.anoSelecionado + '/' + this.semanaSelecionada).then(res=>{
                    this.setarSemana(res.data);
                    this.isLoading = false;

                }).catch(err=>{
              
                    const Toast = Vue.swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'error',
                        title: 'Semana não encontrada. Talvez você não possa alterar essa semana.'
                    });

                    this.isLoading = false;


                });
            },
            salvarSemana: function() {

                this.isLoading = true;

                var semana = {
                    segunda : {
                        a: this.segunda_a,
                        b: this.segunda_b,
                        c: this.segunda_c,
                        d: this.segunda_d,
                        e: this.segunda_e,
                        f: this.segunda_f,
                        g: this.segunda_g,
                        h: this.segunda_h
                    },
                    terca : {
                        a: this.terca_a,
                        b: this.terca_b,
                        c: this.terca_c,
                        d: this.terca_d,
                        e: this.terca_e,
                        f: this.terca_f,
                        g: this.terca_g,
                        h: this.terca_h
                    },
                    quarta : {
                        a: this.quarta_a,
                        b: this.quarta_b,
                        c: this.quarta_c,
                        d: this.quarta_d,
                        e: this.quarta_e,
                        f: this.quarta_f,
                        g: this.quarta_g,
                        h: this.quarta_h
                    },
                    quinta : {
                        a: this.quinta_a,
                        b: this.quinta_b,
                        c: this.quinta_c,
                        d: this.quinta_d,
                        e: this.quinta_e,
                        f: this.quinta_f,
                        g: this.quinta_g,
                        h: this.quinta_h
                    },
                    sexta : {
                        a: this.sexta_a,
                        b: this.sexta_b,
                        c: this.sexta_c,
                        d: this.sexta_d,
                        e: this.sexta_e,
                        f: this.sexta_f,
                        g: this.sexta_g,
                        h: this.sexta_h
                    }
                };

                console.log(semana);

                axios.post('http://localhost:8000/horarios/' + this.anoSelecionado + '/' + this.semanaSelecionada, {semana: semana}).then(res=>{

                    const Toast = Vue.swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'success',
                        title: 'Os dados foram salvos com sucesso.'
                    });

                    this.isLoading = false;


                });
            }
        },
        mounted(){
            this.carregaAnos();
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
