<template>
  <div class="table table-responsive">
    <table class="table table-bordered">
      <thead class="mynav">
        <tr>
          <th class="corLinhaTabela">#</th>
          <th class="corLinhaTabela">Nome</th>
          <th class="corLinhaTabela">Matrícula</th>
          <th class="corLinhaTabela">Encaminhamento</th>
          <th class="corLinhaTabela">Data e horário do pedido</th>
          <th class="corLinhaTabela">Opções</th>
        </tr>
      </thead>
      <tbody>
        <template v-if="atendimentos.length > 0">
          <tr class="{ $consulta->visualizado == 1 ? 'bg-light' : ''}}" v-for='(atendimento, idx) in atendimentos' :key="idx">
            <td><strong>{{idx + 1}}</strong></td>
            <td><strong>{{atendimento.nome}}</strong></td>
            <td><strong>{{atendimento.matricula}}</strong></td>
            <td><strong>{{atendimento.encaminhamento}}</strong></td>
            <td><strong>{{formatarData(atendimento.dia)}} de {{atendimento.horario}}</strong></td>
            <td>
              <div class="row">
                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xl-6 mb-2"> -->
                  <button
                    type="button"
                    class="btn mybtn-table btn-danger py-1 px-4"
                    data-toggle="modal"
                    data-target="#modalExemplo"
                  >Excluir</button>
                <!-- </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12"> -->
                  <a
                    href=""
                    class="btn mybtn-table py-1 px-4"
                  >Detalhes</a>
                <!-- </div> -->
              </div>
            </td>
          </tr>
        </template>
        <template v-else>
          <tr>
            <td colspan="4" class="td-class">
              <strong>
                Nenhum Atendimento Cadastrado!
              </strong>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
    <div
      class="modal fade"
      id="modalExemplo"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      v-if="atendimentos.length > 0"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="exampleModalLabel"
            >Tem certeza que quer excluir esse atendimento ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn mybtn-table py-1 px-4"
              data-dismiss="modal"
            >Não, me arrependi</button>
            <a
              href=""
              class="btn mybtn-table py-1 px-4"
            >Sim, desejo excluir</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Snotify from "vue-snotify";
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
      atendimentos: []
    };
  },
  methods: {
    formatarData(data){
        return Moment(data).format("DD/MM/YYYY");
    },
    carregaAtendimentos() {
      axios
        .get("/consultasPsicologo")
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
  },
  mounted(){
    this.carregaAtendimentos();
  }
};
</script>

<style scoped>
.td-class{
  text-align: center;
}
</style>