<template>
    <div v-if="modalAlterarSituacao">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Situação do Atendimento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                No momento este atendimento está
                                <b>
                                    {{ dadosAtendimento.extendedProps.status | statusAtendimento }}
                                </b>.

                                <form @submit.prevent="atualizarStatus">
                                    <fieldset class="form-group mt-4">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-3 pt-0">Alterar para:</legend>
                                            <div class="col-sm-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                           id="emAberto" value="nao_ocorrido"
                                                           v-model="status">
                                                    <label class="form-check-label" for="emAberto">
                                                        Em aberto
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                           id="concluido" value="ocorrido"
                                                           v-model="status">
                                                    <label class="form-check-label" for="concluido">
                                                        Concluído
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status"
                                                           id="cancelado" value="cancelado"
                                                           v-model="status">
                                                    <label class="form-check-label" for="cancelado">
                                                        Cancelado
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success btn-block">
                                                    Atualizar
                                                </button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
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
        name: "AlterarSituacao",
        data: function () {
            return {
                modalAlterarSituacao: false,
                dadosAtendimento: [],
                status: null,
            }
        },
        methods: {
            close() {
                this.modalAlterarSituacao = false;
            },
            show(dados) {
                //Salvar dados do atendimento
                this.dadosAtendimento = dados;
                this.status = dados.extendedProps.status

                this.modalAlterarSituacao = true;
            },
            statusAtendimento: function (valor) {
                return this.dadosAtendimento.extendedProps.status === valor;
            },
            atualizarStatus: async function () {
                await axios.patch(`/atendimento/status`, {
                    id_atendimento: this.dadosAtendimento.extendedProps.id_atendimento,
                    status: this.status
                })
                    .then(response => {
                        this.$toast("success", response.data.msg);

                        //Atualizar atendimentos
                        this.$parent.atualizarCalendario();

                        //Fechar esse modal
                        this.close();
                    })
                    .catch(e => {
                        this.$toast("error", e.response.data.msg);
                        this.close();
                    });
            }
        },
        filters: {
            statusAtendimento: function (valor) {
                let status;

                switch (valor) {
                    case 'nao_ocorrido':
                        status = 'em aberto';
                        break;
                    case 'ocorrido':
                        status = 'finalizado';
                        break;
                    case 'cancelado':
                        status = 'cancelado';
                        break;
                    default:
                        status = 'desconhecido';
                }
                return status;
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