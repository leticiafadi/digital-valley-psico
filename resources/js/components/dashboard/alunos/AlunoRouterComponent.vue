<template>
  <div>
    <aluno v-if="pagina == 'listarAlunos'"  :carregaAluno='carregaAluno'></aluno>
    <perfil-aluno v-if="pagina == 'paginaAluno'" :aluno="aluno"></perfil-aluno>
    <!--<div v-show="pagina == 'paginaAluno'" class="row">
      <div class="col col-12">
          <div class="fa fa-pull-right">
              <button class="btn mybtn-table btn-lg" @click="voltar()">Retornar para a lista dos alunos</button>
          </div>
      </div>
    </div>-->
  </div>
</template>

<script>
import Vue from "vue";
import Aluno from "./AlunoComponent";
import PerfilAluno from "./perfil/GerenciarAlunoComponent";

export default {
  data: function() {
    return {
			pagina: "",
			aluno: []
    };
  },
  components: {
    Aluno,
    PerfilAluno
  },
  methods: {
    mudaAba(nome) {
      this.pagina = nome;
    },
    voltar(){
      this.pagina = 'listarAlunos';
    },
    carregaAluno(id_aluno){
      this.$http.get(`/alunos/${id_aluno}`).then(response=>{
      	this.aluno = response.data;
      }).catch(err=>{
				this.$toast("error","Aluno não encontrado!");
			}).finally(()=>{
				this.mudaAba('paginaAluno');
			});
    }
  },
  mounted() {
    this.pagina = "listarAlunos";
  }
};
</script>

<style>
</style>