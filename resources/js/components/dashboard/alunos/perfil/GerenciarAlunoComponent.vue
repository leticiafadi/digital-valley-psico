<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-fw fa-user pr-2 mycolor-azul"></i>
            Gerenciar perfil Aluno
          </div>
          <div class="card-body">
            <div>
              <infopessoal-aluno :aluno="this.aluno"></infopessoal-aluno>
            </div>
            <div>
              <infoacademica-aluno :aluno="this.aluno"></infoacademica-aluno>
            </div>
            <div>
              <form @submit.prevent="adicionarObservacao">
                <div class="form-group">
                  <label for="informacoa">Digite alguma informação sobre o aluno</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Digite nesse campos informações do aluno"
                    v-model="observacao"
                    minlength="4"
                    maxlength="255"
                  />
                </div>
                <div>
                  <input type="submit" value="adicionar" class="btn mybtn-table btn" />
                </div>
              </form>
            </div>
            <h5 class="mt-2">Observacoes do aluno</h5>
            <ul class="list-group mt-4">
              <li
                v-for="obs in aluno.observacoes"
                :key="obs"
                class="list-group-item"
              >{{obs.comentario}}</li>
            </ul>
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

export default {
  components: {
    axios,
    VueCalendar,
    ptBR
  },
  props: {
    aluno: Object
  },
  data: function() {
    return {
      observacao: ""
    };
  },
  methods: {
    adicionarObservacao() {
      this.$http
        .post(`/aluno/observacao-aluno/${this.aluno.id}`, {
          observacao: this.observacao
        })
        .then(res => {
          this.$toast("success", "Adicionado com sucesso");
          this.aluno.observacoes.push(res.data);
          this.observacao = "";
        })
        .catch(exception => {
          console.log(exception);
        });
    }
  },
  mounted() {}
};
</script>

