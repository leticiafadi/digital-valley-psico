<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-outline-light" @click="voltar" href="#" role="button">
              <i class="fas fa-fw fa-arrow-alt-circle-left pr-2 mycolor-azul"></i>
            </a>
            <i class="fas fa-fw fa-user pr-2 mycolor-azul"></i>
            Perfil do Aluno
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="tabela" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="infospessoais-tab"
                  data-toggle="tab"
                  href="#infospessoais"
                  role="tab"
                  aria-controls="infospessoais"
                  aria-selected="true"
                >Informações Pessoais</a>
              </li>
              <li class="nav-item">
                <a
                  @click="carregaAtendimentos()"
                  class="nav-link"
                  id="atendimentos-tab"
                  data-toggle="tab"
                  href="#atendimentos"
                  role="tab"
                  aria-controls="atendimentos"
                  aria-selected="false"
                >Atendimentos</a>
              </li>
            </ul>

            <div class="tab-content" id="conteudoTabela">
              <div
                class="tab-pane fade show active"
                id="infospessoais"
                role="tabpanel"
                aria-labelledby="infospessoais-tab"
              >
                <infopessoal-aluno :aluno="this.aluno"></infopessoal-aluno>
                <infoacademica-aluno :aluno="this.aluno"></infoacademica-aluno>
                <infocontato-aluno :aluno="this.aluno"></infocontato-aluno>
                <adicionar-observacao :aluno="this.aluno" ref="modalAdicionarObservacaoAluno"></adicionar-observacao>
                <apagar-observacao ref="modalApagarObservacaoAluno"></apagar-observacao>

                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                      <h2>Observações</h2>
                    </div>
                  </div>

                  <div v-if="existeObservacoes()" class="table table-responsive">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th class="mybg-azul">Observações</th>
                          <th class="mybg-azul">Data</th>
                          <th class="mybg-azul">Opção</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(observacao, index) in observacoes">
                          <td>{{ observacao.comentario }}</td>
                          <td class="text-center">{{ observacao.created_at | formatarData }}</td>
                          <td>
                            <div class="d-flex justify-content-center">
                              <button
                                @click="openModalApagarObservacaoAluno(observacao.id, index)"
                                class="btn mybtn-table py-1 px-4"
                              >Excluir</button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="mb-3" v-else>Não há observações registradas!</div>

                  <button
                    @click="openModalAdicionarObservacaoAluno()"
                    class="btn mybtn-table py-1 px-4"
                  >Nova Observação</button>
                </div>
              </div>

              <div
                class="tab-pane fade"
                id="atendimentos"
                role="tabpanel"
                aria-labelledby="atendimentos-tab"
              >
                <div class="row mt-4">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h2>Lista de Atendimentos</h2>
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="mynav">
                      <tr>
                        <th class="corLinhaTabela">Atendimento</th>
                        <th class="corLinhaTabela">Psicólogo</th>
                        <th class="corLinhaTabela">Data/Horário do Atendimento</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <template v-if="atendimentos.length > 0">
                        <tr v-for="(atendimento, id) in atendimentos" :key="id">
                          <td class="td-class" :class="atendimento.status">{{id+1}}</td>
                          <td class="td-class" :class="atendimento.status">{{atendimento.psicologo}}</td>
                          <td class="td-class" :class="atendimento.status">
                            {{formatarData(atendimento.dia)}} de
                            {{atendimento.horario}}
                          </td>
                        </tr>
                      </template>
                      <template v-else>
                        <tr>
                          <td colspan="4" class="td-class">
                            <strong>Nenhum Atendimento Cadastrado!</strong>
                          </td>
                        </tr>
                      </template>
                    </tbody>
                  </table>
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
import axios from "axios";
import VueCalendar from "vuejs-datepicker";
import { en, ptBR } from "vuejs-datepicker/dist/locale";
import AdicionarObservacao from "./includes/AdicionarObservacaoAlunoComponent";
import ApagarObservacao from "./includes/ApagarObservacaoAlunoComponent";
import Moment from "moment";

export default {
  components: {
    axios,
    VueCalendar,
    ptBR,
    AdicionarObservacao,
    ApagarObservacao,
  },
  props: {
    aluno: {},
  },
  data: function () {
    return {
      observacoes: [],
      state: 0,
      atendimentos: [],
    };
  },
  methods: {
    voltar(id) {
      this.$parent.voltar();
    },
    carregarObservacoesAluno: async function () {
      let vm = this;
      await axios
        .get(`/aluno/observacoes/${vm.aluno.aluno.id}`)
        .then((response) => {
          vm.observacoes = response.data.data;
        })
        .catch((e) => {});
    },
    pushNovoComentario: function (dados) {
      this.observacoes.unshift(dados);
    },
    apagarObservacao: function (id_observacao, index) {
      axios
        .delete(`/aluno/observacoes/${id_observacao}`)
        .then((response) => {
          this.$toast("success", response.data.msg);

          //Atualizar a lista
          let vm = this;
          vm.refresh(index);
        })
        .catch((e) => {
          this.$toast("error", e.response.data.msg);
        });
    },
    existeObservacoes: function () {
      return this.observacoes.length > 0;
    },
    refresh: function (index) {
      this.$delete(this.observacoes, index);
    },
    openModalAdicionarObservacaoAluno: function () {
      this.$refs.modalAdicionarObservacaoAluno.show();
    },
    openModalApagarObservacaoAluno: function (id, index) {
      this.$refs.modalApagarObservacaoAluno.show(id, index);
    },
    carregaAtendimentos: async function () {
      let vm = this;
      await axios
        .get(`/consultasAluno/${vm.aluno.aluno.id}`)
        .then((response) => {
          vm.atendimentos = response.data;
        })
        .catch((err) => {});
    },
    formatarData(data) {
      return Moment(data).format("DD/MM/YYYY");
    },
  },
  filters: {
    formatarData(data) {
      return Moment(data).locale("pt-br").format("LLL");
    },
  },
  async mounted() {
    await this.carregarObservacoesAluno();
  },
};
</script>

<style scoped>
.ocorrido {
  background-color: #d4edda;
}
.cancelado {
  background-color: #f8d7da;
}
</style>

