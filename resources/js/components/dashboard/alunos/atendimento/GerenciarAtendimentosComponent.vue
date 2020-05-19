<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-fw fa-home mycolor-azul"></i>
            Gerenciar atendimentos
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="mynav">
                  <tr>
                    <th class="corLinhaTabela">Atendimento</th>
                    <th class="corLinhaTabela">Psicologo</th>
                    <th class="corLinhaTabela">Data e horário do Atendimento</th>
                    <th class="corLinhaTabela">Opções</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(atendimento, id) in atendimentos" :key='id'>
                    <td>
                      <strong>{{id+1}}</strong>
                    </td>
                    <td>
                      <strong>{{atendimento.psicologo}}</strong>
                    </td>
                    <td>
                      <strong>{{formatarData(atendimento.dia)}} de {{atendimento.horario}}</strong>
                    </td>
                    <td>
                      <button
                        class="btn mybtn-table fa-pull-right"
                        @click="mostrarDetalhes()"
                      >Ver mais</button>
                      <button
                        @click="cancelarAtendimento()"
                        class="btn mybtn-table fa-pull-left"
                        :disabled="false"
                      >Cancelar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import Snotify from "vue-snotify";
import VeeValidate from "vee-validate";
import Moment from "moment";
export default {
  props: {
    baseUrl: String
  },
  components: {
    axios,
    Snotify
  },
  data: function() {
    return {
      atendimento_selecionado: -1,
      indexAtendimentoSelecionado: -1,
      atendimentos: []
    };
  },
  methods: {
    formatarData(data){
        return Moment(data).format("DD/MM/YYYY");
    },
    cancelarAtendimento: function() {},
    mostrarDetalhes: function() {},
    carregaAtendimentos: function() {
      axios
        .get("/atendimentos")
        .then(response => {
          this.atendimentos = response.data;
          if (this.atendimentos.length <= 0)
            this.$toast("warning", "Não há atendimentos");
          else this.$toast("info", "Atendimentos carregados");
        })
        .catch(err => {
          this.$toast("error", "Erro ao carregar atendimentos");
        });
    },
    isValid: function() {}
  },
  mounted() {
    this.carregaAtendimentos();
  }
};
</script>