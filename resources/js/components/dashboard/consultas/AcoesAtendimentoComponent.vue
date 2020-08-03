<template>
    <div v-if="modalAcoes">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog mw-100 w-75" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">O que deseja fazer?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row py-4">
                                    <div class="col-3">
                                        <button @click="openDetalhesModal"
                                                class="btn btn-lg btn-primary btn-block py-4 rounded">
                                            <i class="fas fa-info fa-2x"></i>
                                            <br/>
                                            Ver detalhes
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <button @click="openAdicionarObservacaoModal" class="btn btn-lg btn-primary btn-block py-4 rounded">
                                            <i class="fas fa-pen-alt fa-2x"></i>
                                            <br/>
                                            Adicionar observação
                                        </button>
                                    </div>
                                    <div class="col-3">
                                        <a :href="base_url + '/editar-atendimento/' + dadosAtendimento.id_atendimento">
                                            <button class="btn btn-lg btn-primary btn-block py-4 rounded">
                                                <i class="far fa-clock fa-2x"></i>
                                                <br/>
                                                Alterar horário
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <button @click="openAlterarSituacaoModal" class="btn btn-lg btn-primary btn-block py-4 rounded">
                                            <i class="fas fa-clipboard-list fa-2x"></i>
                                            <br/>
                                            Alterar situação
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        components: {},
        name: "AcoesConsulta",
        props: {
            base_url: {
                type: String
            }
        },
        data: function () {
            return {
                modalAcoes: false,
                dadosAtendimento: null,
            }
        },
        methods: {
            show: function (dados) {
                //Abrir o modal
                this.modalAcoes = true;

                //Salvar os dados recebidos do atendimento
                this.dadosAtendimento = dados;
            },
            close() {
                this.modalAcoes = false;
            },
            openDetalhesModal: function () {
                //Abre o modal de consultas do componente pai
                this.$parent.openDetalhesModal(this.dadosAtendimento);

                //Fecha esse modal
                this.close();
            },
            openAlterarSituacaoModal: function () {
                //Abre o modal para alterar a situação do atendimento
                this.$parent.openAlterarSituacaoModal();

                //Fecha esse modal
                this.close();
            },
            openAdicionarObservacaoModal: function () {
                //Abre o modal para adicionar uma observacao
                this.$parent.openAdicionarObservacaoModal();

                //Fecha esse modal
                this.close();
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
        overflow-y: auto;
    }
</style>