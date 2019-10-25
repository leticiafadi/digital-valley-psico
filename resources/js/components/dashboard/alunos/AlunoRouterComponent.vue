<template>
  <aluno></aluno>
</template>

<script>
import Vue from "vue";
import Aluno from "./AlunoComponent";

export default {
  data: function() {
    return {
      pagina: ""
    };
  },
  components: {
    Aluno
  },
  monted() {
    this.pagina = "listarAluno";
  }
};
</script>

<style>
</style>