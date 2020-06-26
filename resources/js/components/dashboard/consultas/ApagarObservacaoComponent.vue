<template>
    <div v-if="modalApagarObservacao">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmação de Cancelamento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Você confirma que deseja apagar esta observação?</p>
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
        name: "ApagarObservacao",
        data: function () {
            return {
                observacaoId: Number,
                index: Number,
                modalApagarObservacao: false,
            }
        },
        methods: {
            confirmar() {
                this.$http.post(`/observacao/apagar`, {
                    _token: document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    id: this.observacaoId
                }).then(response => {
                    this.$toast("success", "Observação apagada com sucesso!");

                    //Recarregar as observações
                    this.$parent.refresh(this.index);
                }, response => {
                    if (response.status === 404)
                    {
                        this.$toast("error", "Essa observação não foi localizada!");
                    } else {
                        this.$toast("error", "Você não pode apagar essa observação!");
                    }
                });

                //Fechar o modal
                this.close();
            },
            close() {
                this.modalApagarObservacao = false;
            },
            show(observacaoId, index) {
                this.observacaoId = observacaoId;
                this.index = index;
                this.modalApagarObservacao = true;
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