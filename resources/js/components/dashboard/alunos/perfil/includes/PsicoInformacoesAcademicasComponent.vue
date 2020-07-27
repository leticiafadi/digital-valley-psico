<template>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <h2>Informações acadêmicas</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input type="text" class="form-control" name="Matricula" v-model="matricula" :disabled="false">
                </div>
            </div>
            <!--<div class="col col-3">
                <div class="form-group">
                    <label for="turnoCurso">Turno do curso</label>
                    <input type="text" class="form-control" v-model="turnoCurso" name="turnoCurso">
                </div>
            </div>
            <div class="col col-3">
                <div class="form-group">
                    <label for="formacaoEscolar">Formação escolar básica</label>
                    <input type="text" class="form-control" v-model="formacaoEscolar" name="formacaoEscolar">
                </div>
            </div>-->
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <!-- <div class="form-group">
                    <label for="curso">Curso atual</label>
                    <input type="text" class="form-control" v-model="curso" name="curso" :disabled="false">
                </div> -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Curso Atual</label>
                    <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_curso')}"  v-model="curso" name="id_curso" v-validate="'required'"> 
                        <option v-for="curso1 in cursos" :key='curso1.id' :value="curso1.id">{{curso1.nome}}</option>
                    </select>

                    <span>{{errors.first('id_curso')}}</span>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="semestreIngresso">Semestre de ingresso</label>
                    <input type="text" class="form-control" v-model="semestre" name="semestreIngresso" :disabled="false">
                </div>
            </div>
            <div class="col-lg-12">
                <button 
                    @click='atualizar'
                    type='button'
                    class="btn mybtn-table py-1 px-4"
                >Atualizar Informações Academicas</button>
            </div>
        </div>
        <!--<div class="row">
            <div class="col col-4">
                <div class="form-group">
                    <label for="semestreAtual">Semestre atual</label>
                    <input type="text" class="form-control" v-model="semestreAtual" name="semestreAtual">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="formacaIngresso">Forma de ingresso</label>
                    <input type="text" class="form-control" v-model="formaIngresso" name="formaIngresso">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                <div class="form-group">
                    <label for="cursosConcluidos">Cursos já concluídos</label>
                    <input type="text" class="form-control" v-model="cursosConcluidos" name="cursosConcluidos">
                </div>
            </div>
        </div>-->
    </div>
</template>

<script>
import VueCalendar  from 'vuejs-datepicker'
import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
export default {
    components:{
            VueCalendar,
            ptBR
    },
    props:{
        aluno: {
            type: Object,
            required: true,
        }
    },
    data: function(){
        return {
            matricula: '',
            curso: '',
            semestre: '',
            cursos: [],
        }
    },
    methods:{
        atualizar () {
            this.$http
                .post(`/aluno/academico`, {
                    id: this.aluno.id,
                    matricula: this.matricula,
                    curso: this.curso,
                    semestre: this.semestre,
                })
                .then(response => {
                    this.$toast("success", "Informações Atualizadas!");
                })
                .catch(err => {
                    this.$toast("error", "Erro ao Atualizar!");
                })
        },
        carregarCursos () {
            axios.get('/cursos/get').then(response=>{
                this.cursos = response.data;
            });
        }
    },
    created () {
        if (this.aluno) {
            this.matricula = this.aluno.aluno.matricula
            this.curso = this.aluno.aluno.curso.id
            this.semestre = this.aluno.aluno.semestre_matricula
        }
        this.carregarCursos()
    }
}
</script>