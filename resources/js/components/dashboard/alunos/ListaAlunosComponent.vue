<template>
    <div class="container">
        <div class="row mx-3 mt-3">
            <div class="col-4 page-title">
                Visualizar Alunos
            </div>
            <div class="col-3 offset-md-5">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" v-model="searchTerm" placeholder="Pesquisar">
                </div>
            </div>
        </div>
        <div class="row mx-3 mt-1">
            <div class="col col-12">
                <vue-good-table
                        :columns="columns"
                        :rows="rows"
                        :pagination-options="paginationOptions"
                        :search-options="{
                                enabled: true,
                                externalQuery: searchTerm
                              }">
                    <div slot="emptystate" class="text-center">
                        Não há registros.
                    </div>
                    <template slot="table-row" slot-scope="props">
                                    <span v-if="props.column.field == 'acao'">
                                        <button @click="abrirPerfil(props.row.id_usuario)"
                                                class="btn mybtn-table py-1 px-4">
                                            Ver perfil
                                        </button>
                                    </span>
                        <span v-else>
                            {{props.formattedRow[props.column.field]}}
                        </span>
                    </template>
                </vue-good-table>
            </div>
        </div>
    </div>
</template>

<script>
    import 'vue-good-table/dist/vue-good-table.css'
    import {VueGoodTable} from 'vue-good-table';

    export default {
        name: "ListaAlunos",
        components: {
            VueGoodTable,
        },
        data() {
            return {
                columns: [
                    {
                        label: 'Nome Completo',
                        field: 'nome_completo',
                        type: 'string',
                        tdClass: 'text-left align-middle',
                        thClass: 'text-center',
                        sortable: false,
                    },
                    {
                        label: 'Matrícula',
                        field: 'matricula',
                        tdClass: 'text-center align-middle',
                        thClass: 'text-center',
                        sortable: false,
                    },
                    {
                        label: 'Curso',
                        field: 'curso',
                        type: 'string',
                        sortable: false,
                        tdClass: 'text-center align-middle',
                        thClass: 'text-center',
                    },
                    {
                        label: 'Ação',
                        field: 'acao',
                        sortable: false,
                        tdClass: 'text-center align-middle',
                        thClass: 'text-center',
                    }
                ],
                rows: [],
                searchTerm: '',
                paginationOptions: {
                    enabled: true,
                    perPage: 30,
                    mode: 'records',
                    nextLabel: 'Avançar',
                    prevLabel: 'Retornar',
                    rowsPerPageLabel: 'Registros por página',
                    ofLabel: 'de',
                    pageLabel: 'página',
                    allLabel: 'Tudo',
                }
            };
        },
        methods: {
            async carregarAlunos() {
                try {
                    let vm = this;
                    const res = await fetch('/alunos/get');
                    vm.rows = await res.json();

                    if (vm.rows.length <= 0)
                        this.$toast("warning", "Não há alunos registrados!");
                    else
                        this.$toast("info", "Lista de alunos carregada com sucesso!");
                } catch (error) {
                    this.$toast("error", "Não foi possível carregar a lista de alunos!");
                }
            },
            abrirPerfil(id) {
                this.$parent.carregaAluno(id);
            }
        },
        async mounted() {
            //Carregar lista de alunos
            await this.carregarAlunos();

            //Carregar os cursos existentes dentro do filtro na tabela
            let listaDeCursos = [...new Set(this.rows.map(item => item.curso))];
            this.$set(this.columns[2], 'filterOptions', {
                enabled: true,
                placeholder: 'Filtrar por',
                filterDropdownItems: listaDeCursos,
            });
        }
    }
</script>

<style scoped>
    .has-search .form-control {
        padding-left: 2.375rem;
    }

    .has-search .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }
</style>