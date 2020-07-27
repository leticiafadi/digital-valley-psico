<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-home"></i>
                        Gerenciar atendimentos
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="mynav">
                                <tr>
                                    <th class="corLinhaTabela">Atendimento</th>
                                    <th class="corLinhaTabela">Psicólogo</th>
                                    <th class="corLinhaTabela">Data/Horário do Atendimento</th>
                                    <th class="corLinhaTabela">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <template v-if="atendimentos.length > 0">

                                    <tr v-for="(atendimento, id) in atendimentos" :key='id'>
                                        <td class="td-class" :class="atendimento.status">
                                            {{id+1}}
                                        </td>
                                        <td class="td-class" :class="atendimento.status">
                                            {{atendimento.psicologo}}
                                        </td>
                                        <td class="td-class" :class="atendimento.status">
                                            {{formatarData(atendimento.dia)}} de
                                                {{atendimento.horario}}
                                        </td>
                                        <td class="td-class" :class="atendimento.status">
                                            <button
                                                    @click="modalCancelamento(atendimento.id)"
                                                    class="btn mybtn-table py-1 px-4"
                                                    :disabled="statusBotaoCancelar(atendimento.status)"
                                            >Cancelar
                                            </button>
                                            <button
                                                    class="btn mybtn-table py-1 px-4"
                                                    @click="modalDetalhes(atendimento.id)"
                                            >Detalhes
                                            </button>
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
                        </div>
                    </div>
                </div>
                <cancelar-atendimento ref="modalCancel"></cancelar-atendimento>
                <detalhes-atendimento ref="modalDetails"></detalhes-atendimento>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from "axios";
    import Snotify from "vue-snotify";
    import VeeValidate from "vee-validate";
    import Moment from "moment";
    import CancelarAtendimento from "./CancelarAtendimentoComponent";
    import DetalhesAtendimento from "./DetalhesAtendimentoComponent";

    export default {
        props: {
            baseUrl: String
        },
        components: {
            axios,
            Snotify,
            CancelarAtendimento,
            DetalhesAtendimento,
        },
        data: function () {
            return {
                atendimento_selecionado: -1,
                indexAtendimentoSelecionado: -1,
                atendimentos: []
            };
        },
        methods: {
            statusBotaoCancelar: function (status) {
                if (status === 'cancelado' || status === 'ocorrido') {
                    return true;
                }
                return false;
            },
            formatarData(data) {
                return Moment(data).format("DD/MM/YYYY");
            },
            modalCancelamento(atid) {
                this.$refs.modalCancel.show(atid);
            },
            modalDetalhes: function (atid) {
                this.$refs.modalDetails.show(atid);
            },
            carregaAtendimentos: function () {
                axios
                    .get("/atendimentos")
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
            isValid: function () {
            }
        },
        mounted() {
            this.carregaAtendimentos();
        }
    };
</script>
<style scoped>
    .ocorrido {
        background-color: #d4edda;
    }
    .cancelado {
        background-color: #f8d7da;
    }
    .td-class {
        text-align: center;
    }
</style>