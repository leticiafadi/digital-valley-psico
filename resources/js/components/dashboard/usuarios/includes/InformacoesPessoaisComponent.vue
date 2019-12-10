<template>
  <div>
    <div>
      <div class="text-center">
        <h3>Informações pessoais</h3>
      </div>
    </div>
    <div class="row">
      <div class="col col-12">
        <div class="form-group">
          <label for="nome">Nome *</label>
          <input
            type="text"
            class="form-control"
            :class="{'is-invalid' : errors.has('nome')}"
            id="nome"
            placeholder="Nome completo"
            name="nome"
            v-model="nome"
            v-validate="'required|alpha_spaces|min:3|max:191'"
          />

          <span>{{errors.first('nome')}}</span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col col-3">
        <label for>Gênero *</label>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="genero"
              id="genero-masculino"
              value="m"
              v-model="genero"
              required
              checked
            />
            <label class="form-check-label" for="genero-masculino">Masculino</label>
          </div>
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="genero"
              id="genero-feminino"
              value="f"
              v-model="genero"
              required
            />
            <label class="form-check-label" for="genero-feminino">Feminino</label>
          </div>
        </div>
      </div>
      <div class="col col-9">
        <div class="form-group">
          <label for="nascimento">Data de nascimento *</label>
          <!--<vue-calendar input-class="form-control" placeholder="Clique aqui e selecione sua data de nascimento" v-model="dataNascimento" format="dd/MM/yyyy" :language="pt" :bootstrap-styling="true" :full-month-name="true" :calendar-button="true" calendar-button-icon="fas fa-calendar" name="data_nascimento" v-validate="'date_format:dd/MM/yyyy'" :input-class="'bg-white'" :disabledDates="this.disabled_dates" :open-date="this.open_date">
          </vue-calendar>-->
          <datetime
            v-model="dataNascimento"
            class="theme-red"
            format="dd/MM/yyyy"
            :max-datetime="minDate + 'T00:00Z'"
            :class="{'is-invalid' : errors.has('dataNascimento'), 'is-valid': this.validaData()}"
            input-class="form-control"
            name="data_nascimento"
          ></datetime>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col col-12">
        <div class="fa-pull-right">
          <button
            type="button"
            class="btn mybtn-table"
            :disabled="!this.isValid()"
            @click="this.proximo"
          >
            Próximo
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

 <script>
import MaskedInput from "vue-masked-input";
import Moment from "moment";
import { Datetime } from "vue-datetime";
import { en, ptBR } from "vuejs-datepicker/dist/locale";
import VeeValidate from "vee-validate";

export default {
  props: {
    setError: Function,
    mudaAba: Function,
    old: Object
  },
  components: {
    MaskedInput,
    Datetime,
    ptBR
  },
  data: function() {
    return {
      nome: "",
      dataNascimento: "",
      genero: "m",
      pt: ptBR,
      minDate: 0,
      open_date: new Date()
    };
  },
  methods: {
    validaNome: function() {
      return (
        this.nome.length >= 3 &&
        /^[a-zA-Zäáàãâëéèêẽíìîöóòôúùñûç ]+$/.test(this.nome)
      );
    },
    validaData: function() {
      var ano = this.dataNascimento.split("-", 1);
      return this.dataNascimento != "" && ano <= 2001;
    },
    isValid: function() {
      return this.validaNome() && this.validaData();
    },
    proximo: function() {
      this.mudaAba("informacoesProfissionais");
    }
  },
  mounted() {
    //Desabilitando datas
    const dia = 1000 * 60 * 60 * 24;
    var hoje = new Date();
    this.minDate = Moment(hoje.getTime() - 365 * 15 * dia).format("YYYY-MM-DD");

    this.nome = this.old.nome;
    this.genero = this.old.genero ? this.old.genero : "m";
    this.dataNascimento = this.old.data_nascimento;
  }
};
</script>

 <style>
[name="data_nascimento"] {
  background-color: red;
}
</style>