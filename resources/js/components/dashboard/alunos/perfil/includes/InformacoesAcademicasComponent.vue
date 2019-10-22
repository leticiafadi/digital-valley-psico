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
                    <label for="matricula">Matricula</label>
                    <input type="text" class="form-control" name="Matricula" v-model="this.aluno.matricula" :disabled="verifica()">
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
                <div class="form-group">
                    <label for="curso">Curso atual</label>
                    <input type="text" class="form-control" v-model="this.aluno.curso" name="curso" :disabled="verifica()">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="semestreIngresso">Semestre de ingresso</label>
                    <input type="text" class="form-control" v-model="this.aluno.semestre_matricula" name="semestreIngresso" :disabled="verifica()">
                </div>
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
        aluno: Array,
        tipo: Number
    },
    data: function(){
        return {

        }
    },
    methods:{
        verifica: function(){
            if (this.tipo==1) {
                return false;
            }else{
                return true;
            }
        }
    }
}
</script>