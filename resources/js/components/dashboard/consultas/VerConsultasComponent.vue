<template>
    <div class="table table-responsive">
        <table class="table table-bordered">
            <thead class="mynav">
            <tr>
                <th class="corLinhaTabela">#</th>
                <th class="corLinhaTabela">Nome</th>
                <th class="corLinhaTabela">Matrícula</th>
                <th class="corLinhaTabela">Encaminhamento</th>
                <th class="corLinhaTabela">Data e horário do pedido</th>
                <th class="corLinhaTabela">Opções</th>
            </tr>
            </thead>
            <tbody>
            <template v-if="atendimentos.length > 0">
                <tr class="bg-light" v-for='(atendimento, idx) in atendimentos'
                    :key="idx">
                    <td :class="atendimento.status">{{idx + 1}}</td>
                    <td :class="atendimento.status">{{atendimento.nome}}</td>
                    <td :class="atendimento.status">{{atendimento.matricula}}</td>
                    <td :class="atendimento.status">{{atendimento.encaminhamento}}</td>
                    <td :class="atendimento.status">{{formatarData(atendimento.dia)}} de {{atendimento.horario}}</td>
                    <td class="td-class" :class="atendimento.status">
                        <button
                                @click="modalCancelamento(atendimento.id)"
                                class="btn mybtn-table py-1 px-4"
                                :disabled="statusBotaoCancelar(atendimento.status)"
                        >Cancelar
                        </button>
                        <button
                                class="btn mybtn-table py-1 px-4"
                                @click=""
                        >Ver mais
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
        <cancelar-consulta ref="modalCancel"></cancelar-consulta>
    </div>
</template>

<script>
    import axios from "axios";
    import Snotify from "vue-snotify";
    import Moment from "moment";
    import CancelarConsulta from "./CancelarConsultaComponent";
    export default {
        props: {
            baseUrl: String
        },
        components: {
            axios,
            Snotify,
            CancelarConsulta
        },
        data: function () {
            return {
                atendimentos: []
            };
        },
        methods: {
            formatarData(data) {
                return Moment(data).format("DD/MM/YYYY");
            },
            modalCancelamento(atid) {
                this.$refs.modalCancel.show(atid);
            },
            statusBotaoCancelar: function (status) {
                if (status === 'cancelado' || status === 'ocorrido') {
                    return true;
                }
                return false;
            },
            carregaAtendimentos() {
                axios
                    .get("/consultasPsicologo")
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