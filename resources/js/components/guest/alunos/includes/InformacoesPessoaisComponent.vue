<template>
    <div>
        <div>
            <div class="text-center">
                <h3>Informações pessoais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                <div class="form-group">
                    <label for="nome">Nome *</label>
                    <h6 class="is-valid form-control">{{nome}}</h6>
                    <input type="hidden" class="form-control"  :class="{'is-invalid' : errors.has('nome'), 'is-valid': this.validaNome()}" id="nome" placeholder="Nome completo" name="nome" v-bind:value="nome"/>
                    
                    <span>{{errors.first('nome')}}</span>

                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col col-3">
            <label for="">Gênero *</label>
                <div class="form-group" :class="{'is-invalid' : errors.has('genero'), 'is-valid': this.validaGenero()}">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero-masculino" value="m"  v-model="genero" required :checked="true">
                        <label class="form-check-label" for="genero-masculino" >Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero-feminino" value="f" v-model="genero">
                        <label class="form-check-label" for="genero-feminino">Feminino</label>
                    </div> 

                    <span>{{errors.first('genero')}}</span>                   
                </div>
            </div>
            <div class="col col-9">
                <div class="form-group">
                    <label for="nascimento">Data de nascimento *</label>
                    <datetime v-model="dataNascimento" class="theme-blue" format="dd/MM/yyyy" :class="{'is-invalid' : errors.has('dataNascimento'), 'is-valid': this.validaData()}" input-class="form-control" name="data_nascimento"></datetime> 
                </div>
            </div>  
        </div>    
   
        <div class="row">
            <div class="col col-12">
                <div class="fa-pull-right">
                    <button type="button" class="btn mybtn-table btn-lg" :disabled="!this.isValid()"  @click="this.proximo" >Próximo <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

 <script>
    import MaskedInput  from 'vue-masked-input';
    import { Datetime } from 'vue-datetime';
    import {en, ptBR}   from 'vuejs-datepicker/dist/locale';
    import VeeValidate  from 'vee-validate';    

    import 'vue-datetime/dist/vue-datetime.css'
    
    export default {
        props: {
            setError: Function,
            mudaAba : Function,
            old     : Object
        },
        components:{
            MaskedInput,
            Datetime,
            ptBR
        },
        data:function(){
            return {
                nome: '',
                dataNascimento : '',
                genero: 'm',
                pt: ptBR, 
                disabled_dates: {},
                open_date : new Date()
            }
        },
        methods:{
            validaNome:function(){
                return this.nome.length >= 3 && /^[a-zA-Zäáàãâëéèêẽíìîöóòôúùñûç ]+$/.test(this.nome);
            },
            validaData:function(){
                var ano = this.dataNascimento.split("-", 1);
                if(ano > 2001){
                    this.$toast("warning", "Menor de idade não pode se cadastrar no sistema.");
                }
                return this.dataNascimento != '' && ano <= 2001;
            },
            validaGenero:function(){
                return this.genero != '';
            },
            isValid:function(){
                return this.validaNome() && this.validaData() && this.validaGenero(); 
            },
            proximo:function(){
                this.mudaAba('informacoesUniversitarias');
            } 
        },
        mounted(){
            //Desabilitando datas
            const dia = 1000*60*60*24;
            var hoje = new Date();
            this.open_date = hoje.getTime()-365*16*dia


            this.nome           = this.old.nome;
            this.genero         = this.old.genero ? this.old.genero : 'm';

        }
    }
 </script>

 <style>
    [name=data_nascimento]{
        background-color: #fff;
    }
 </style>