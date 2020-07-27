<template>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <h2>Informações pessoais</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="nomeCompleto">Nome Completo</label>
                    <input type="text" class="form-control" name="nomeCompleto" v-model="nome" :disabled="false">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="dataNascimento">Data de nascimento</label>
                    <datepicker 
                        :bootstrap-styling="true"
                        v-model='dtnascimento'
                        :language='ptBR'
                        format='dd/MM/yyyy'
                    ></datepicker> 
                    <!-- <input type="text" class="form-control" name="dataNascimento" v-model="dtnascimento" :disabled="false"> -->
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <!-- <div class="form-group">
                    <label for="cidadeNatal">Cidade natal</label>
                    <input type="text" class="form-control" name="cidadeNatal" v-model="cidade" :disabled="false">
                </div> -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cidade natal</label>
                    <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_cidade')}"  name="id_cidade" v-model="cidade" v-validate="'required'">
                        <option v-for="cidade1 in cidades" :key='cidade1.id' :value=cidade1.id>{{cidade1.name}}</option>
                    </select>

                    <span>{{errors.first('id_cidade')}}</span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <!-- <div class="form-group">
                    <label for="estadoNatal">Estado natal</label>
                    <input type="text" class="form-control" name="estadoNatal" v-model="estado" :disabled="false">
                </div> -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Estado natal</label>
                    <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_estado')}"  v-model="estado" name="id_estado" v-validate="'required'"> 
                        <option v-for="estado1 in estados" :key='estado1.id' :value="estado1.id">{{estado1.name}}</option>
                    </select>

                    <span>{{errors.first('id_estado')}}</span>

                </div>
            </div>    
        </div>
        <!--<div class="row">
            <div class="col col-4">
                <div class="form-group">
                    <label for="estadoCivil">Estado civil</label>
                    <input type="text" class="form-control" name="estadoCivil" v-model="estadoCivil">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="possuiFilhos">Possui filhos</label>
                    <input type="text" class="form-control" v-model="possuiFilhos" name="possuiFilhos">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="resideCom">Reside com</label>
                    <input type="text" class="form-control" v-model="resideCom" name="resideCom">
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" v-model="endereco" name="endereco" :disabled="false">
                </div>
            </div>
            <div class="col col-12 col-md-3">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" :class="{'is-invalid' : errors.has('bairro')}"  name="bairro" id="bairro" placeholder="Digite seu bairro" v-model="bairro" v-validate="'required|min:5'">

                    <span>{{errors.first('bairro')}}</span>

                </div>
            </div>
            <div class="col col-12 col-md-3">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" :class="{'is-invalid' : errors.has('numero')}"  name="numero" id="numero" v-model="numero" placeholder="Somente números"  v-validate="'required|numeric'"/>

                    <span>{{errors.first('numero')}}</span>

                </div>
            </div>
        </div>
        <button
            @click='atualizar'
            type='button'
            class="btn mybtn-table py-1 px-4"
        >Atualizar Informações Pessoais</button>
<!--        <div class="row">-->
<!--            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">-->
<!--                <div class="form-group">-->
<!--                    <label for="telefoneCelular">Telefone celular</label>-->
<!--                    <input type="text" class="form-control" v-model="this.aluno.contatos.celular" name="telefoneCelular" :disabled="false">-->
<!--                </div>-->
<!--            </div>            -->
<!--            <template v-if="this.aluno.contatos.telefone == null">-->
<!--                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">-->
<!--                <div class="form-group">-->
<!--                    <label for="telefoneResidencial">Telefone residencial</label>-->
<!--                    <input type="text" class="form-control" name="telefoneResidencial" :disabled="false">-->
<!--                </div>-->
<!--            </div>-->
<!--            </template>-->
<!--           <template v-else>-->
<!--                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">-->
<!--                <div class="form-group">-->
<!--                    <label for="telefoneResidencial">Telefone residencial</label>-->
<!--                    <input type="text" class="form-control" v-model="this.aluno.contatos.telefone" name="telefoneResidencial" :disabled="false">-->
<!--                </div>-->
<!--            </div>-->
<!--            </template>-->
<!--        </div>-->
    
    </div>
</template>

<script>
import Datepicker  from 'vuejs-datepicker'
import {ptBR}   from 'vuejs-datepicker/dist/locale'
import VeeValidate  from  'vee-validate'
import Moment from "moment"
export default {
    components:{
        ptBR,
        Datepicker,
    },
    props:{
        aluno: {
            type: Object,
            required: true,
        }
    },
    data (){
        return {
            nome: '',
            dtnascimento: '',
            cidade: '',
            estado: '',
            endereco: '',
            numero: '',
            bairro: '',
            estados: [],
            cidades: [],
            ptBR: ptBR,
            // minDate: Moment().subtract(15, 'years').format("YYYY-MM-DD"),
        }
    },
    created () {
        if (this.aluno) {
            this.nome = this.aluno.nome_completo
            this.dtnascimento = Moment(this.aluno.data_nascimento)._d
            this.cidade = this.aluno.endereco.cidade.id
            this.estado = this.aluno.endereco.cidade.estado.id
            this.endereco = this.aluno.endereco.rua
            this.numero = this.aluno.endereco.numero
            this.bairro = this.aluno.endereco.bairro
        }
    },
    watch: {
        estado (value) {
            this.carregarCidades(value);
        }
    },
    methods:{
        atualizar () {
            this.$http
                .post(`/aluno/pessoal`, {
                    id: this.aluno.id,
                    nome: this.nome,
                    dtnascimento: Moment(this.dtnascimento).format('YYYY-MM-DD'),
                    id_cidade: this.cidade,
                    endereco: this.endereco,
                    numero: this.numero,
                    bairro: this.bairro,
                })
                .then(response => {
                    this.$toast("success", "Informações Atualizadas!");
                })
                .catch(err => {
                    this.$toast("error", "Erro ao Atualizar!");
                })
        },
        carregarEstados () {
            axios.get('/estados/' + this.aluno.endereco.cidade.estado.country_id).then(response=>{
                this.estados = response.data;
            });
        },
        carregarCidades (idEstado=this.aluno.endereco.cidade.state_id) {
            axios.get('/cidades/' + idEstado).then(response=>{
                this.cidades = response.data;
            });
        }
    },
    mounted () {
        this.carregarEstados();
        this.carregarCidades();
    }
}
</script>

