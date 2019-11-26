<template>
	<div>
		<aluno v-if="pagina == 'listarAlunos'" :mudaAba="mudaAba"></aluno>
		<perfil-aluno v-if="pagina == 'paginaAluno'"></perfil-aluno>
	</div>
</template>

<script>
	import Vue from "vue";
	import Aluno from "./AlunoComponent";
	import PerfilAluno from "./perfil/GerenciarAlunoComponent";

	export default {
	data: function() {
		return {
		pagina: ""
		};
	},
	components: {
		Aluno,
		PerfilAluno
	},
	methods: {
		mudaAba(nome) {
		this.pagina = nome;
		}
	},
	mounted() {
		this.pagina = "listarAlunos";
	}
	};
</script>

	<style>
	</style>