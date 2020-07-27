<template>
    <div v-if="modalApagarObservacaoAluno">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmação de Remoção</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Você confirma a remoção desta observação?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" @click="confirmar">Confirmar</button>
                                <button type="button" class="btn btn-danger" @click="close">Cancelar
                                </button>
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
        name: "apagarObservacaoAluno",
        data: function () {
            return {
                modalApagarObservacaoAluno: false,
                id_observacao: Number,
                index: Number,
            }
        },
        methods: {
            show(id, index) {
                //Abre o modal
                this.modalApagarObservacaoAluno = true;

                //Salva o ID do atendimento
                this.id_observacao = id;

                //Salvar o index da observacao
                this.index = index;
            },
            close() {
                this.modalApagarObservacaoAluno = false;
            },
            confirmar() {
                //Recarregar os atendimentos
                this.$parent.apagarObservacao(this.id_observacao, this.index);

                //Fechar o modal
                this.close()
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
</style>