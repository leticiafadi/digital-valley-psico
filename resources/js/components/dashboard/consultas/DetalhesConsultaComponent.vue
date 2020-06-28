<template>
    <div v-if="modalConsulta">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog mw-100 w-75" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detalhes do Atendimento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <p>
                                        <b>Nome: </b>
                                        {{ detalhesConsulta.title }}
                                        <br/>
                                        <b>Matrícula: </b>
                                        {{ detalhesConsulta.extendedProps.matricula }}
                                        <br/>
                                        <b>Encaminhamento: </b>
                                        {{ detalhesConsulta.extendedProps.encaminhamento }}
                                    </p>
                                    <p>
                                        Observações do atendimento
                                    </p>
                                    <table v-if="existeObservacoes()" class="tg">
                                        <thead>
                                        <tr>
                                            <th class="tg-0lax w-75">Observação</th>
                                            <th class="tg-0lax">Data</th>
                                            <th class="tg-0lax">Ação</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(obs, index) in observacoes">
                                            <td class="tg-0lax">{{ obs.observacao }}</td>
                                            <td class="tg-0lax text-center">
                                                {{ formatarData(obs.created_at) }}
                                            </td>
                                            <td class="tg-0lax text-center">
                                                <button @click="ativarModalApagarObservacao(obs.id, index)" class="btn btn-sm btn-danger">
                                                    <i class="far fa-trash-alt" ></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p v-else>
                                        Não há observações registradas!
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="close">Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>

        <apagar-observacao ref="modalApagarObservacao"></apagar-observacao>
    </div>
</template>

<script>
    import Moment from "moment";
    import ApagarObservacao from "./ApagarObservacaoComponent";
    export default {
        components: {
            ApagarObservacao
        },
        name: "DetalhesConsulta",
        data: function () {
            return {
                modalConsulta: false,
                detalhesConsulta: [],
                observacoes: []
            }
        },
        methods: {
            show: function (detalhesConsulta) {
                //Salvar as observacoes
                this.observacoes = detalhesConsulta.extendedProps.observacoes;
                //Salvar os detalhes da consulta
                this.detalhesConsulta = detalhesConsulta;
                //Abrir o modal
                this.modalConsulta = true;
            },
            close() {
                this.modalConsulta = false;
            },
            ativarModalApagarObservacao: function(observacaoId, index){
                this.$refs.modalApagarObservacao.show(observacaoId, index);
            },
            formatarData(data) {
                return Moment(data).format("DD/MM/YYYY");
            },
            existeObservacoes() {
                return Object.keys(this.observacoes).length !== 0;
            },
            refresh: function(index){
                this.$delete(this.observacoes, index);
            }
        }
    }

</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .modal-body {
        height: 450px;
        overflow-y: auto;
    }

    ul {
        list-style: none;
    }

    .tg {
        border-collapse: collapse;
        border-color: #9ABAD9;
        border-spacing: 0;
        width: 100%;
    }

    .tg td {
        background-color: #EBF5FF;
        border-color: #9ABAD9;
        border-style: solid;
        border-width: 1px;
        color: #444;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        background-color: #409cff;
        border-color: #9ABAD9;
        border-style: solid;
        border-width: 1px;
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-0lax {
        vertical-align: top
    }

    #endChat {
        float: left;
    }

    #sendMessage {
        float: right;
    }

    .form-group {
        overflow: hidden;
    }

    #messageArea {
        width: 100%;
    }

    #endChat, #sendMessage {
        height: 110px;
    }
</style>