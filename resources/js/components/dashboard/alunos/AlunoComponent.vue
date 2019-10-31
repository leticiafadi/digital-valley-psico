<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="col col-12">
          <div class="card">
            <div class="card-header">
              <i class="fas fa-fw fa-user-graduate text-primary"></i>
              <span>Visualizar alunos</span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col col-12 col-md-6">
                  <div class="form-group">
                    <label for="maticula">Nome completo do Aluno</label>
                    <input
                      v-model="nomebusca"
                      name="matricula"
                      class="form-control"
                      placeholder="Ex: Jose da Silva Brito"
                    />
                  </div>
                </div>
                <div class="col col-12 col-md-6">
                  <div class="form-group">
                    <label id="label-curso">Selecione o filtro de busca</label>
                    <select name="id_curso" class="form-control" v-model="selected">
                      <option value>Todos</option>
                      <option v-for="curso in cursos" v-bind:value="curso.id">{{curso.nome}}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <ul class="list-group" v-if="alunos != ''">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="mybg-azul">Nome</th>
                      <th class="mybg-azul">Matricula</th>
                      <th class="mybg-azul">Curso</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-for="aluno in this.alunos">
                      <tr v-on:click.prevent="perfilAluno(aluno.id)" style="cursor: pointer">
                        <td>{{aluno.nome_completo}}</td>
                        <td>{{aluno.matricula}}</td>
                        <td>{{aluno.nome}}</td>
                      </tr>
                    </template>
                  </tbody>
                </table>
              </ul>
              <ul v-else>
                <strong></strong>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import VeeValidate from "vee-validate";
import perfilAluno from "./perfil/GerenciarAlunoComponent";

/*const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

Toast.fire({
  type: 'error',
  title: 'Não existe um aluno associado a esse filtro de busca'
})*/

export default {
  props: {
    mudaAba: Function,
    carregaAluno: Function
  },
  data: function() {
    return {
      alunos: [],
      cursos: [],
      selected: "",
      nomebusca: ""
    };
  },
  components: {},
  watch: {
    selected() {
      this.buscar();
    },
    nomebusca() {
      this.buscar();
    }
  },
  methods: {
    buscar() {
      this.$http
        .get(`/alunos/get?query=${this.nomebusca}&id_curso=${this.selected}`)
        .then(response => {
          this.alunos = response.data.alunos;
          if (this.alunos.length == 0)
            this.$toast("info", "Nenhum aluno foi encontrado com a pesquisa.");
        })
        .catch(err => {
          this.$toast("warning", "Não foi possível buscar os alunos");
        });
    },
    carregarCursos() {
      this.$http
        .get("/cursos/get")
        .then(response => {
          this.cursos = response.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    perfilAluno(id_aluno){
      //this.mudaAba('paginaAluno');
      this.carregaAluno(id_aluno);
    }

  },
  mounted() {
    this.buscar();
    this.carregarCursos();
  }
};

</script>
