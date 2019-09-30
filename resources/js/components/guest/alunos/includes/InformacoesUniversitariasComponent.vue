<template >
    <div>
        <div>
            <div class="text-center">
                <h3>Informações universitárias</h3>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-md-4">
               <div class="form-group">
                    <label for="maticula">Matrícula *</label>
                    <masked-input name="matricula" mask="111111" :class="{'is-invalid' : errors.has('matricula'), 'is-valid': this.matriculasIsValid()}" class="form-control" placeholder="Somente números" v-model="matricula" disabled/>
               
                    <span>{{errors.first('matricula')}}</span>
               </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="curso" id="label-curso">Curso *</label>
                    <select name="id_curso" id="curso" :class="{'is-invalid' : errors.has('id_curso'), 'is-valid': this.cursoIsValid()}" class="form-control" v-model="curso">
                        <option value="">Selecione seu curso</option>
                        <option v-for="curso in cursos" v-bind:value="curso.id">{{curso.nome}}</option>
                    </select>

                    <span>{{errors.first('curso')}}</span>
                </div>
            </div>
             <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="semestre">Semestre de ingresso *</label>
                    <masked-input name="semestre_matricula" :class="{'is-invalid' : errors.has('semestre'), 'is-valid': this.semestreIsValid()}" :mask="{pattern: 'mcuu.s', formatCharacters:{'m': { validate: char => /^2$/.test(char)}, 'c' : {validate: char => /^[0-1]$/.test(char)}, 'u' : { validate: char => /^\d$/.test(char)}, 's': {validate: char => /^[1-2]$/.test(char)}}}" class="form-control" placeholder="XXXX.X" v-model="semestre" id="semestre" />
                
                    <span>{{errors.first('semestre')}}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                <div class="fa fa-pull-left">
                    <button type="button" class="btn btn-primary btn-lg" @click="this.anterior"> <i class="fas fa-chevron-left"></i> Anterior</button>
                </div>
                <div class="fa fa-pull-right">
                    <button type="button" class="btn btn-primary btn-lg" :disabled="!this.isValid()" @click="this.proximo" >Próximo <i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</template> 
 <script>
    import VeeValidate from 'vee-validate';
    import MaskedInput from 'vue-masked-input'
    export default {
        props:{
            cursos: Array,
            mudaAba: Function,
            old: Array
        },
        data: function(){
            return {
                matricula : '',
                curso:      '',
                semestre:   ''
            }
        },
        watch:{
            matricula: 'passaMatricula',
            curso:     'passaCurso'
        },
        components:{
            MaskedInput
        },
        methods:{
            matriculasIsValid:function(){
                return /^[\d]{6}$/.test(this.matricula);
            },
            cursoIsValid:function(){
                return this.curso > 0;
            },
            semestreIsValid:function(){
                return /^[\d]{4}\.\d$/.test(this.semestre);
            },
            passaMatricula:function(){
                if(this.matriculasIsValid())
                    document.getElementById('label-curso').focus();
            },
            passaCurso:function(){
                if(this.cursoIsValid())
                    document.getElementById('semestre').focus();
            },
            proximo:function(){
                this.mudaAba('localizacaoEContato');
            },
            anterior:function(){
                this.mudaAba('informacoesPessoais');
            },
            isValid:function(){
                return this.matriculasIsValid() && this.cursoIsValid() && this.semestreIsValid();
            }
        },
        mounted(){
           this.matricula = this.old.matricula;
        }
    }
 </script>