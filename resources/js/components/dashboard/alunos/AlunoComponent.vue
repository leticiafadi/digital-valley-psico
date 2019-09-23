<template>
    <div class="container">
            <vue-snotify></vue-snotify>
            <div class="row">
                <div class="col col-12">
                   <div class="col col-12">
                        <div class="card">
                            <div class="card-header">
                            <i class="fas fa-fw fa-user-graduate"></i>
                                <span>Visualizar alunos</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="maticula">Nome completo do Aluno</label>
                                            <input name="matricula" class="form-control" placeholder="Ex: Jose da Silva Brito"/>
                                        </div>
                                    </div>

                                    <div class="col col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="curso" id="label-curso">Curso *</label>
                                            <select name="id_curso" id="curso" class="form-control" v-model="curso">
                                                <option value="">Selecione o filtro de busca</option>
                                                <option v-for="curso in cursos" v-bind:value="curso.id">{{curso.nome}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col col-12 col-md-4">
                                        <button type="button" class="btn btn-primary btn-lg">Buscar </button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            //curso_selecionado : -1,
            //indexCursoSelecionado : -1,
            //cursos : [],
            alunos: []
        }
    },
    components:{
        axios,
        Snotify
    },
    methods:{
        /*carregaCursos: function(){
            axios.get( this.baseUrl + '/cursos/get').then(response=>{
                this.cursos = response.data;
            });
        },*/
        carregaAlunos: function(){
            axios.get(this.baseUrl + '/alunos/get').then(response=>{
                this.alunos = response.data;
            });
        },
        mounted(){
            this.carregaAlunos();
        }
    }    
}
</script>