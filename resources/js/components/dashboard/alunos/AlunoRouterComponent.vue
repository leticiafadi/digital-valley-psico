<template>
    <div>
        <lista-alunos v-if="pagina == 'listaAlunos'"></lista-alunos>
        <perfil-aluno v-if="pagina == 'perfilAluno'" :aluno="aluno"></perfil-aluno>
    </div>
</template>

<script>

    import ListaAlunos from "./ListaAlunosComponent";
    import PerfilAluno from "./perfil/GerenciarAlunoComponent";

    export default {
        data: function () {
            return {
                pagina: "",
                aluno: []
            };
        },
        components: {
            ListaAlunos,
            PerfilAluno
        },
        methods: {
            mudaAba(nome) {
                this.pagina = nome;
            },
            voltar() {
                this.pagina = "listaAlunos";
            },
            carregaAluno(id_usuario) {
                this.$http
                    .get(`/alunos/${id_usuario}`)
                    .then(response => {
                        this.aluno = response.data;

                    })
                    .catch(err => {
                        this.$toast("error", "Aluno não encontrado!");
                    })
                    .finally(() => {
                        this.mudaAba("perfilAluno");
                    });
            }
        },
        mounted() {
            this.pagina = "listaAlunos";
        }
    };
</script>

<style>
</style>
