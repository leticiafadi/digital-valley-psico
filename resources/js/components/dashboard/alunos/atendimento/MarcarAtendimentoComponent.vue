<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-calendar mycolor-azul"></i>
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
                                    <select v-model="idPsico" name="id_curso" class="form-control">
                                            <option value="">Selecione um psicólogo</option> 
                                            <option v-for="psicologo in psicologos" v-bind:value="psicologo.id" :key="psicologo.id">{{psicologo.nome_completo}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="motivoAtendimento">Semana Disponivel</label>
                                    <select v-model="nrsemana" name="id_curso" class="form-control">
                                            <option value="">Selecione uma Semana Disponível</option> 
                                            <option v-for="semana in semanas" v-bind:value="semana.numeroSemana" :key="semana.numeroSemana">Semana {{semana.numeroSemana}} de {{formatarData(semana.inicio)}} até {{formatarData(semana.final)}} </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div v-if="this.idPsico!=0 && this.nrsemana!=0">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="mt-4 mb-4">
                                    </div>
                                    <div class="table-responsive">
                                        *Os horários desabilitados não estão disponíveis
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
                                                        <input type="checkbox" v-model="segunda_a_2" id="" :disabled='!segunda_a'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_a_2" id="" :disabled='!terca_a'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_a_2" id="" :disabled='!quarta_a'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_a_2" id="" :disabled='!quinta_a'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_a_2" id="" :disabled='!sexta_a'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            09:00 - 10:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_b_2" id="" :disabled='!segunda_b'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_b_2" id="" :disabled='!terca_b'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_b_2" id="" :disabled='!quarta_b'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_b_2" id="" :disabled='!quinta_b'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_b_2" id="" :disabled='!sexta_b'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            10:00 - 11:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_c_2" id="" :disabled='!segunda_c'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_c_2" id="" :disabled='!terca_c'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_c_2" id="" :disabled='!quarta_c'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_c_2" id="" :disabled='!quinta_c'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_c_2" id="" :disabled='!sexta_c'>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            11:00 - 12:00
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_d_2" id="" :disabled='!segunda_d'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_d_2" id="" :disabled='!terca_d'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_d_2" id="" :disabled='!quarta_d'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_d_2" id="" :disabled='!quinta_d'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_d_2" id="" :disabled='!sexta_d'>
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
                                                        <input type="checkbox" v-model="segunda_e_2" id="" :disabled='!segunda_e'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_e_2" id="" :disabled='!terca_e'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_e_2" id="" :disabled='!quarta_e'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_e_2" id="" :disabled='!quinta_e'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_e_2" id="" :disabled='!sexta_e'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            14:30 - 15:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_f_2" id="" :disabled='!segunda_f'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_f_2" id="" :disabled='!terca_f'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_f_2" id="" :disabled='!quarta_f'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_f_2" id="" :disabled='!quinta_f'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_f_2" id="" :disabled='!sexta_f'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            15:30 - 16:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_g_2" id="" :disabled='!segunda_g'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_g_2" id="" :disabled='!terca_g'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_g_2" id=""  :disabled='!quarta_g'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_g_2" id="" :disabled='!quinta_g'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_g_2" id="" :disabled='!sexta_g'>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="text-center text-bold">
                                                            16:30 - 17:30
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="segunda_h_2" id="" :disabled='!segunda_h'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="terca_h_2" id=""  :disabled='!terca_h'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quarta_h_2" id="" :disabled='!quarta_h'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="quinta_h_2" id="" :disabled='!quinta_h'>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" v-model="sexta_h_2" id="" :disabled='!sexta_h'>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                                    <button type="submit" class="btn mybtn-table btn-lg">
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
    import { Datetime } from 'vue-datetime'
    import Moment from 'moment';
    export default {
        components:{
            VueCalendar,
            ptBR,
            Datetime
        },
        props:{
        },
        data: function(){
            return{
                pt:ptBR,
                dataAtendimento: '',
                dias: [],
                motivoEncaminhamento: '',
                textMotivoEncaminhamento: '',
                psicologos: [],
                idPsico: 0,
                semanas: [],
                nrsemana: 0 ,
                
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
                sexta_h: false,

                segunda_a_2: false,
                segunda_b_2: false,
                segunda_c_2: false,
                segunda_d_2: false,
                segunda_e_2: false,
                segunda_f_2: false,
                segunda_g_2: false,
                segunda_h_2: false,

                terca_a_2: false,
                terca_b_2: false,
                terca_c_2: false,
                terca_d_2: false,
                terca_e_2: false,
                terca_f_2: false,
                terca_g_2: false,
                terca_h_2: false,

                quarta_a_2: false,
                quarta_b_2: false,
                quarta_c_2: false,
                quarta_d_2: false,
                quarta_e_2: false,
                quarta_f_2: false,
                quarta_g_2: false,
                quarta_h_2: false,

                quinta_a_2: false,
                quinta_b_2: false,
                quinta_c_2: false,
                quinta_d_2: false,
                quinta_e_2: false,
                quinta_f_2: false,
                quinta_g_2: false,
                quinta_h_2: false,

                sexta_a_2: false,
                sexta_b_2: false,
                sexta_c_2: false,
                sexta_d_2: false,
                sexta_e_2: false,
                sexta_f_2: false,
                sexta_g_2: false,
                sexta_h_2: false
            }
        },
        watch:{
            nrsemana : "carregaHorario"
        },
        methods:{
            carregaHorario(){
                if(this.idPsico!=0){
                    this.$http.get(`/psicologo/get?query=${this.nrsemana}&id=${this.idPsico}`).then(response=> {
                        this.dias = response.data;
                        this.setarSemana();
                        if(this.dias.length == 0){
                            this.$toast("info","Não tem nenhum horario disponível");
                        }
                    }).catch(err => {
                        this.$toast("warning", "Não foi possível buscar os horarios");
                    });
                }
                
            },
            carregasemana(){
                var dia = new Date();
                
                const tamanhoDia = 1000*60*60*24;

                while(Moment(dia).format('dddd') != 'Monday'){
                    dia = new Date(dia.getTime() - tamanhoDia);
                }
                while(dia < new Date(new Date().getTime() + tamanhoDia * 20)){
                    this.semanas.push({numeroSemana: Moment(dia).format('W'),inicio : dia, final : new Date(dia.getTime() + tamanhoDia * 4)});
                    dia = new Date(dia.getTime() + tamanhoDia*7);
                }
            },
            formatarData: function(date) {
        		return Moment(date).format('  DD/MM  ');
            },
            formatarDiaSemana: function(date){
                //formata o dia que aparece na tabela
        		return Moment(date.dia).lang('pt-br').format(' ddd DD/MM  ');
            },
            setarSemana: function(){                
                
                this.segunda_a  = this.dias[0].horarios[0];
                this.segunda_b  = this.dias[0].horarios[1];
                this.segunda_c  = this.dias[0].horarios[2];
                this.segunda_d  = this.dias[0].horarios[3];
                this.segunda_e  = this.dias[0].horarios[4];
                this.segunda_f  = this.dias[0].horarios[5];
                this.segunda_g  = this.dias[0].horarios[6];
                this.segunda_h  = this.dias[0].horarios[7];

                this.terca_b    = this.dias[1].horarios[1];
                this.terca_c    = this.dias[1].horarios[2];
                this.terca_d    = this.dias[1].horarios[3];
                this.terca_e    = this.dias[1].horarios[4];
                this.terca_a    = this.dias[1].horarios[0];
                this.terca_f    = this.dias[1].horarios[5];
                this.terca_g    = this.dias[1].horarios[6];
                this.terca_h    = this.dias[1].horarios[7];

                this.quarta_a    = this.dias[2].horarios[0];
                this.quarta_b    = this.dias[2].horarios[1];
                this.quarta_c    = this.dias[2].horarios[2];
                this.quarta_d    = this.dias[2].horarios[3];
                this.quarta_e    = this.dias[2].horarios[4];
                this.quarta_f    = this.dias[2].horarios[5];
                this.quarta_g    = this.dias[2].horarios[6];
                this.quarta_h    = this.dias[2].horarios[7];

                this.quinta_a    = this.dias[3].horarios[0];
                this.quinta_b    = this.dias[3].horarios[1];
                this.quinta_c    = this.dias[3].horarios[2];
                this.quinta_d    = this.dias[3].horarios[3];
                this.quinta_e    = this.dias[3].horarios[4];
                this.quinta_f    = this.dias[3].horarios[5];
                this.quinta_g    = this.dias[3].horarios[6];
                this.quinta_h    = this.dias[3].horarios[7];

                this.sexta_a    = this.dias[4].horarios[0];
                this.sexta_b    = this.dias[4].horarios[1];
                this.sexta_c    = this.dias[4].horarios[2];
                this.sexta_d    = this.dias[4].horarios[3];
                this.sexta_e    = this.dias[4].horarios[4];
                this.sexta_f    = this.dias[4].horarios[5];
                this.sexta_g    = this.dias[4].horarios[6];
                this.sexta_h    = this.dias[4].horarios[7];

            },
            salvarHorario(){
                
            },
            limpaMotivo(){
                this.textMotivoEncaminhamento = '';
            },
            carregaPsicologos(){
                this.$http.get(`/psicologos`).then(response => {
                    this.psicologos = response.data;
                })
            },
        },
        mounted(){
            this.carregaPsicologos();
            this.carregasemana();
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