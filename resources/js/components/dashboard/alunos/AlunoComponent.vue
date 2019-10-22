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
                                <div class="row">
                                    <div class="col col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="maticula">Nome completo do Aluno</label>
                                            <input v-model="nomebusca" name="matricula" class="form-control" placeholder="Ex: Jose da Silva Brito"/>
                                        </div>
                                    </div>
                                    <div class="col col-12 col-md-6">
                                        <div class="form-group">
                                            <label id="label-curso">Selecione o filtro de busca</label>
                                            <select name="id_curso" class="form-control" v-model="selected">
                                                <option value="">Todos</option>
                                                <option v-for="curso in cursos" v-bind:value="curso.id">{{curso.nome}}</option>
                                            </select>
                                        </div>
                                    </div>    
                                   <!-- <div class="col col-12 col-md-2">
                                        <div class="form-group">
                                            <div class="fa-pull-right mt-4">
                                            <button type="button" @click="buscar()" class="btn btn-primary btn-lg">Buscar </button>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group" v-if="alunos != ''">
                                    <table class="table table-bordered" >
                                        <thead class="mynav">
									        <tr>
										        <th class="corLinhaTabela">
										    	    Nome
										        </th>
										        <th class="corLinhaTabela">
											        Matricula
										        </th>
										        <th class="corLinhaTabela">
											        Curso
                                                </th>
                                                <th class="corLinhaTabela">
                                                    Opções
                                                </th>
									        </tr>
								        </thead>
                                        <tbody>
                                            <template v-for="aluno in this.alunos">
											    <tr>
												    <td>
                                                        {{aluno.nome_completo}}
                                                    </td>
												    <td>
													    {{aluno.matricula}}
												    </td>
												    <td>
													    {{aluno.nome}}
												    </td>
                                                    <td>
                                                        <a href="" class="btn btn-primary fa-pull-right mynav corLinhaTabela">Ver detalhes</a>
                                                       <!-- <router-link :to="{name:'alu'}"> teste </router-link>
                                                        <router-view></router-view>-->
                                                    </td>
									            </tr>
                                            </template>
								        </tbody>
                                    </table>
                                </ul>
                                <ul v-else>
                                    <strong>Não existe nenhum aluno relacionado a esse filtro de busca... :(</strong>
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
import VueRouter from 'vue-router';
import perfilAluno from './perfil/GerenciarAlunoComponent';

/*const router = new VueRouter({
    routes: [
        {
            path: '/',
            component: perfilAluno,
            name: 'alu',
        },
        {
            path: '/:id',
            component: perfilAluno,
            name: 'teste'
        }
    
    ]
})*/

export default {
    props:{
            base_url: String,
            cursos: Array
    },
    data:function(){
        return{
            alunos: [],
            selected: '',
            nomebusca: ''
        }
    },
    components:{
        axios,
        Snotify,
        VueRouter
    },
    watch:{
        selected(){
            this.buscar();
        },
        nomebusca(){
            this.buscar();
        }
    },
    methods:{
        carregaAlunos: function(){
            axios.get(this.base_url + '/alunos/get').then(response=>{
                this.alunos = response.data.alunos;
            });
        },
        buscar: function() {
            axios.get(this.base_url + '/alunos/get?query=' + this.nomebusca + '&id_curso=' + this.selected + '').then(response=>{
                this.alunos = response.data.alunos;
            })
        }
    },
    mounted(){
        this.carregaAlunos();
    }    
}
</script>
