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
          <input
            type="text"
            class="form-control"
            name="nomeCompleto"
            v-model="nome"
            :disabled="false"
          />
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="dataNascimento">Data de nascimento</label>
          <datepicker
            :bootstrap-styling="true"
            v-model="dtnascimento"
            :language="ptBR"
            format="dd/MM/yyyy"
          ></datepicker>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Cidade natal</label>
          <select
            class="form-control"
            id
            :class="{'is-invalid' : errors.has('id_cidade')}"
            name="id_cidade"
            v-model="cidade"
            v-validate="'required'"
          >
            <option
              v-for="cidade1 in cidades"
              :key="cidade1.id"
              :value="cidade1.id"
            >{{cidade1.name}}</option>
          </select>

          <span>{{errors.first('id_cidade')}}</span>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Estado natal</label>
          <select
            class="form-control"
            id
            :class="{'is-invalid' : errors.has('id_estado')}"
            v-model="estado"
            name="id_estado"
            v-validate="'required'"
          >
            <option
              v-for="estado1 in estados"
              :key="estado1.id"
              :value="estado1.id"
            >{{estado1.name}}</option>
          </select>

          <span>{{errors.first('id_estado')}}</span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input
            type="text"
            class="form-control"
            v-model="endereco"
            name="endereco"
            :disabled="false"
          />
        </div>
      </div>
      <div class="col col-12 col-md-3">
        <div class="form-group">
          <label for="bairro">Bairro</label>
          <input
            type="text"
            class="form-control"
            :class="{'is-invalid' : errors.has('bairro')}"
            name="bairro"
            id="bairro"
            placeholder="Digite seu bairro"
            v-model="bairro"
            v-validate="'required|min:5'"
          />

          <span>{{errors.first('bairro')}}</span>
        </div>
      </div>
      <div class="col col-12 col-md-3">
        <div class="form-group">
          <label for="numero">Número</label>
          <input
            type="text"
            class="form-control"
            :class="{'is-invalid' : errors.has('numero')}"
            name="numero"
            id="numero"
            v-model="numero"
            placeholder="Somente números"
            v-validate="'required|numeric'"
          />

          <span>{{errors.first('numero')}}</span>
        </div>
      </div>
    </div>
    <button
      @click='atualizar'
      type="button"
      class="btn mybtn-table py-1 px-4">Atualizar Informações Pessoais</button>
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
        Datepicker
    },
    props:{
        funcionario: {
            type: Object,
            required: true,
        }
    },
    created () {
        if (this.funcionario) {
            this.nome = this.funcionario.usuario.nome_completo
            this.dtnascimento = Moment(this.funcionario.usuario.data_nascimento)._d
            this.cidade = this.funcionario.usuario.endereco.cidade.id
            this.estado = this.funcionario.usuario.endereco.cidade.estado.id
            this.endereco = this.funcionario.usuario.endereco.endereco
            this.numero = this.funcionario.usuario.endereco.numero
            this.bairro = this.funcionario.usuario.endereco.bairro
        }
    },
    data () {
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
        }
    },
    methods: {
      atualizar () {
        this.$http
          .post(`/users/edit/pessoais`, {
              id: this.funcionario.id,
              nome: this.nome,
              dtnascimento: this.dtnascimento,
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
        axios.get('/estados/' + this.funcionario.usuario.endereco.cidade.estado.country_id).then(response=>{
          this.estados = response.data;
        });
      },
      carregarCidades (idEstado=this.funcionario.usuario.endereco.cidade.state_id) {
        axios.get('/cidades/' + idEstado).then(response=>{
          this.cidades = response.data;
        });
      }
    },
    mounted () {
        this.carregarEstados();
        this.carregarCidades();
    },
    watch: {
        estado (value) {
            this.carregarCidades(value);
        }
    },
}
</script>

<style>
</style>