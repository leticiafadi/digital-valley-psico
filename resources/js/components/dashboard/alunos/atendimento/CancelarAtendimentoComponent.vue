<template>
    <div v-if="modalCancelamento">
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
                                <p>Você confirma o cancelamento desse atendimento?</p>
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
        name: "CancelarAtendimento",
        data: function () {
            return {
                modalCancelamento: false,
                atendimentoId: Number,
            }
        },
        methods: {
            show(atid) {
                //Abre o modal
                this.modalCancelamento = true
                //Salva o ID do atendimento
                this.atendimentoId = atid
            },
            close() {
                this.modalCancelamento = false;
            },
            confirmar() {
                this.$http.post(`/atendimentos/cancelar`, {
                    _token: document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    atid: this.atendimentoId
                }).then(response => {
                    this.$toast("success", "Atendimento cancelado com sucesso!");
                }, response => {
                    if (response.status === 404)
                    {
                        this.$toast("error", "Esse atendimento não foi localizado!");
                    } else {
                        this.$toast("error", "Esse atendimento não pode ser cancelado!");
                    }
                });
                //Fechar o modal
                this.close()
                //Recarregar os atendimentos
                this.$parent.carregaAtendimentos();
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