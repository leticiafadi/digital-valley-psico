<<<<<<< HEAD
    <template>
        <div class="container">
=======
<template>
    <div class="container">
>>>>>>> 104ca74bd3e9d857ec779f9d683a74361840288e
            <vue-snotify></vue-snotify>
            <div class="row">
                <div class="col col-12">
                   <div class="col col-12">
                        <div class="card">
                            <div class="card-header">
                            <i class="fas fa-fw fa-user-graduate"></i>
                                <span>Visualizar alunos</span>
                            </div>
<<<<<<< HEAD

                            <!--
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active bg-white" href="#">Cursos ativos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Cursos desativados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Todos os cursos</a>
                                </li>
                                </ul>
                            </div>
                            -->

                            
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlSelect1">Digite o nome completo do aluno</label>
                                        <input type="text" class="form-control" name="pesquisa" placeholder="EX: Francisco Etevaldo de Oliveira.">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlSelect1">Selecione o filtro de pesquisa</label>
                                        <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_curso')}" v-model="id_curso" name="id_curso">             
                                            <option value="" selected>Todos os cursos</option>
                                            <option v-for="curso in cursos" :value="curso.id" :key="curso.id">{{curso.nome}}</option>
                                        </select>    
                                    </div>
                                </div>
                                
                                <ul class="list-group">
                                    <template v-for="aluno in alunos">
                                        <li class="list-group-item"> <!--v-if="aluno.id != aluno_selecionado"-->
                                            {{aluno.nome_completo}}
                                        </li>
                                    </template>
                                </ul>
                                <form class="form" v-on:submit="this.pesquisarAluno">
                                    <div class="fa fa-pull-right">
                                        <button class="btn btn-primary btn-lg ml-4 mt-3">Buscar</button>
                                    </div>
                                </form>
=======
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="maticula">Nome completo do Aluno</label>
                                            <input name="matricula" class="form-control" placeholder="Ex: Jose da Silva Brito"/>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-5">
                                        <div class="form-group">
                                            <label id="label-curso">Selecione o filtro de busca</label>
                                            <select name="id_curso" class="form-control">
                                                <option value="">Todos</option>
                                                <option v-for="curso in cursos" v-bind:value="curso.id">{{curso.nome}}</option>
                                            </select>
                                        </div>
                                    </div>    
                                    <div class="col col-12 col-md-2">
                                        <div class="form-group">
                                            <div class="fa-pull-right mt-4">
                                            <button type="button" class="btn btn-primary btn-lg">Buscar </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <template v-for="aluno in this.alunos">
                                        
                                        <li class="list-group-item"> 
                                            {{aluno.nome_completo}} 
                                        </li>
                                    </template>
                                </ul>
>>>>>>> 104ca74bd3e9d857ec779f9d683a74361840288e
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </div>
</template>

<script>
    import axios    from 'axios';
    import Snotify  from 'vue-snotify';
    import VeeValidate from 'vee-validate';
    export default {
        props:{
            baseUrl: String,
            cursos: Array
        },
        data:function(){
            return{
                aluno_selecionado : -1,
                //indexAlunoSelecionado : -1,
                curso_selecionado : -1,
                indexCursoSelecionado : -1,
                cursos : [],
                alunos: []
            }
        },
        components:{
            axios,
            Snotify
        },
        methods:{
            carregaAlunos: function(){
                axios.get( this.baseUrl + '/alunos/get').then(response=>{
                    this.alunos = response.data.alunos;
                });
            },
            carregaCurso : function(curso, index){
                this.curso_selecionado = curso.id;
                this.indexCursoSelecionado = index;
            },
        },
        mounted(){
            this.carregaAlunos();
        }
    }
=======
    </div>
</template>

<script>
import axios    from 'axios';
import Snotify  from 'vue-snotify';
import VeeValidate from 'vee-validate';

export default {
    props:{
            base_url: String,
            cursos: Array
    },
    data:function(){
        return{
            alunos: []
        }
    },
    components:{
        axios,
        Snotify
    },
    methods:{
        carregaAlunos: function(){
            axios.get(this.base_url + '/alunos/get').then(response=>{
                this.alunos = response.data.alunos;
            });
        }
    },
    mounted(){
        this.carregaAlunos();
    }    
}
>>>>>>> 104ca74bd3e9d857ec779f9d683a74361840288e
</script>