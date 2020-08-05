<template>
    <div v-if="modalAdicionarObservacaoAluno">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-dialog mw-100 w-50" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adicionar Observação</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" @click="close">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="adicionarObservacao">
                                    <div class="form-group">
                                        <label for="observacao">Escreva abaixo sua observação: </label>
                                        <textarea v-model="observacao" class="form-control" id="observacao"
                                                  rows="3" @input="limparErros('observacao')"></textarea>
                                        <p class="text-danger" v-text="msgDeErro('observacao')">Erro aqui</p>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-success">
                                            Adicionar
                                        </button>

                                        <button type="button" class="btn btn-danger" @click="close">
                                            Cancelar
                                        </button>
                                    </div>
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
        name: "AdicionarObservacaoAluno",
        props: {
            aluno: Object
        },
        data: function () {
            return {
                modalAdicionarObservacaoAluno: false,
                observacao: '',
                erros: [],
            }
        },
        methods: {
            /*
            * MÉTODOS PARA CONTROLAR AS OBSERVACOES
            * */
            adicionarObservacao: async function () {
                await axios.post('/aluno/observacoes', {
                    id_aluno: this.aluno.aluno.id,
                    observacao: this.observacao
                }).then(response => {
                    this.$toast("success", "Observação criada com sucesso!");

                    //Limpa o formulário
                    this.limparObservacao();

                    //Adiciona novo comentário ao componente pai
                    this.$parent.pushNovoComentario(response.data.data);

                    //Fecha esse modal
                    this.close();
                }).catch(erros => {
                    if (erros.response.status === 401) {
                        this.$toast("error", "Não foi possível criar uma observação!");
                        this.limparObservacao();
                        this.close();
                    } else {
                        this.erros = erros.response.data.errors;
                    }
                });
            },
            limparObservacao: function () {
                this.observacao = '';
            },

            /*
            *   METODOS PARA CONTROLE DE ERROS
            * */
            msgDeErro: function (chave) {
                if (this.temErro(chave)) {
                    return this.erros[chave][0];
                }
            },
            limparErros: function (chave) {
                if (this.temErro(chave)) {
                    this.erros[chave] = null;
                }
            },
            temErro: function (chave) {
                return this.erros && this.erros[chave] && this.erros[chave].length > 0;
            },
            /*
            *   METODOS PARA CONTROLE DO MODAL
            * */
            close() {
                this.modalAdicionarObservacaoAluno = false;
            },
            show(dados) {
                this.id_atendimento = dados;
                this.modalAdicionarObservacaoAluno = true;
            }
        },
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
