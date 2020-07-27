<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-outline-light" @click='voltar' href="#" role="button">
                            <i class="fas fa-fw fa-arrow-alt-circle-left pr-2 mycolor-azul"></i>
                        </a>
                        <i class="fas fa-fw fa-user pr-2 mycolor-azul"></i>
                        Gerenciar Perfil do Aluno
                    </div>
                    <div class="card-body">
                        <infopessoal-aluno :aluno="this.aluno"></infopessoal-aluno>
                        <infoacademica-aluno :aluno="this.aluno"></infoacademica-aluno>
                        <infocontato-aluno :aluno="this.aluno"></infocontato-aluno>
                        <adicionar-observacao :aluno="this.aluno"
                                              ref="modalAdicionarObservacaoAluno"></adicionar-observacao>
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
                                                <button @click="openModalApagarObservacaoAluno(observacao.id, index)" class="btn mybtn-table py-1 px-4">
                                                    Excluir
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mb-3" v-else>
                                Não há observações registradas!
                            </div>

                            <button @click="openModalAdicionarObservacaoAluno()" class="btn mybtn-table py-1 px-4">
                                Nova Observação
                            </button>
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
    import {en, ptBR} from "vuejs-datepicker/dist/locale";
    import AdicionarObservacao from "./includes/AdicionarObservacaoAlunoComponent";
    import ApagarObservacao from "./includes/ApagarObservacaoAlunoComponent";
    import Moment from "moment";

    export default {
        components: {
            axios,
            VueCalendar,
            ptBR,
            AdicionarObservacao,
            ApagarObservacao
        },
        props: {
            aluno: {}
        },
        data: function () {
            return {
                observacoes: [],
                state: 0
            };
        },
        methods: {
            voltar(id) {
                this.$parent.voltar();
            },
            carregarObservacoesAluno: async function () {
                await axios.get(`/aluno/observacoes/${this.aluno.id}`)
                    .then(response => {
                        let vm = this;
                        vm.observacoes = response.data.data;
                    })
                    .catch(e => {
                    });
            },
            pushNovoComentario: function (dados) {
                this.observacoes.unshift(dados);
            },
            apagarObservacao: function (id_observacao, index) {
                axios.delete(`/aluno/observacoes/${id_observacao}`)
                    .then(response => {
                        this.$toast("success", response.data.msg);

                        //Atualizar a lista
                        let vm = this;
                        vm.refresh(index);
                    })
                    .catch(e => {
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
            }
        },
        filters: {
            formatarData(data) {
                return Moment(data).locale('pt-br').format("LLL");
            },
        },
        async mounted() {
            await this.carregarObservacoesAluno();
        }
    };
</script>