<template>
  <div>
    <aluno v-if="pagina == 'listarAlunos'"  :carregaAluno='carregaAluno'></aluno>
    <perfil-aluno v-if="pagina == 'paginaAluno'" :aluno="aluno"></perfil-aluno>
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