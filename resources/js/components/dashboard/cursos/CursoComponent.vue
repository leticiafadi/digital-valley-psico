<template>
        <div class="container">
             <vue-snotify></vue-snotify>
            <div class="row">
                <div class="col col-12">
                   <div class="col col-12">
                        <div class="card">
                            <div class="card-header">
                            <i class="fas fa-fw fa-graduation-cap pr-2 mycolor-azul"></i>
                                <span>Gerenciar cursos</span>
                            </div>
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
                                <ul class="list-group">
                                    <template v-for="(curso, index) in this.cursos">
                                       
                                        <li class="list-group-item" v-if="curso.id != curso_selecionado"> 
                                            {{curso.nome}} 
                                        </li>
                                        <!--<li class="list-group-item bg-selecionado" v-else>
                                            <form @submit.prevent="alteraCurso(curso.id)">
                                                <div class="form-group">
                                                    <label for="alterarCurso">Digite o novo nome do curso</label>
                                                    <input type="text"  class="form-control" v-bind:value="curso.nome" @keyup.27="cancelarCurso()" id="alterarCurso"/>
                                                </div>
                                                <div class="fa fa-pull-right">
                                                    <button class="btn btn-primary ml-2">Salvar</button>
                                                    <button type="button" class="btn btn-danger ml-2" @click="cancelarCurso()">Cancelar</button>
                                                </div>
                                            </form>
                                        </li>-->
                                    </template>
                                    <!--<li class="list-group-item">
                                        <form class="form" v-on:submit="this.criarCurso">
                                            <div class="form-group">
                                                <label for="novoCurso">Criar novo curso <i class="fas fa-plus m-2"></i></label>
                                                <input type="text"  class="form-control" placeholder="Criar novo curso" id="novoCurso"/>
                                            </div>
                                            <div class="fa fa-pull-right">
                                                <button class="btn btn-primary btn-lg ml-2">Criar</button>
                                            </div>
                                        </form>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    import Snotify  from 'vue-snotify';
    import VeeValidate from 'vee-validate';
    export default {
        props:{
            baseUrl: String
        },
        data:function(){
            return{
                curso_selecionado : -1,
                indexCursoSelecionado : -1,
                cursos : []
            }
        },
        components:{
            Snotify
        },
        methods:{
            carregaCurso(curso, index){
                this.curso_selecionado = curso.id;
                this.indexCursoSelecionado = index;
            },
            cancelarCurso(){
                this.curso_selecionado = -1;
                this.indexCursoSelecionado = -1;
            },
            criarCurso(event){
                event.preventDefault();
                this.$http.post(`/cursos/create`,{nome: document.getElementById('novoCurso').value, _token : document.querySelector('meta[name="csrf-token"]').getAttribute('content')})
                .then(response => {
                   this.cursos.push(response.data);
                    this.$snotify.success('Curso cadastrado com sucesso', {
                        position        : "rightTop",
                        showProgressBar : false
                    });
                    document.getElementById('novoCurso').value = '';
                });            
            },
            carregaCursos: function(){
                this.$http.get(`/cursos/get`).then(response=>{
                    this.cursos = response.data;
                });
            },
            alteraCurso:function(id){
                this.$http.post()
                ({
                    method  : 'post',
                    url     : this.baseUrl + '/cursos/alter',
                    data    : {id: id , value : document.getElementById("alterarCurso").value }
                }).then(response =>{
                   if(response.data.success){//Se a operacao for bem sucedida no back end
                        this.cursos[this.indexCursoSelecionado].nome = document.getElementById("alterarCurso").value;
                        document.getElementById("alterarCurso").value = '';
                        this.$snotify.success('Nome do curso alterado com sucesso', {
                            position        : "rightTop",
                            showProgressBar : false
                        });
                        this.cancelarCurso();
                    }
                });
            }
        },
        mounted(){
            this.carregaCursos();
        }
    }
</script>

<style>
    .bg-selecionado{
        background-color: #ccc;
    }
</style>
