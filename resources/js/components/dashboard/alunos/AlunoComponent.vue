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
</script>