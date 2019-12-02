<template>
    <div>
        <div>
            <div class="text-center">
                <h3>Informações profissionais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-md-6">
                <div class="form-group">
                    <label for="siape">Siape *</label>
                    <masked-input mask="1111111" class="form-control" placeholder="7 dígitos" name="siape" v-model="siape" id="siape"/>

                </div>
            </div>
            <div class="col col-12 col-md-6">
                <div class="form-group">
                    <label for="crp">CRP *</label>
                    <masked-input mask="11/11111" name="crp" v-model="crp" placeholder="Digite o crp do funcionário" class="form-control" id="crp"/>    
                
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col col-12">
                <div class="fa fa-pull-left">
                    <button type="button" class="btn mybtn-table" @click="this.anterior"> <i class="fas fa-chevron-left"></i> Anterior</button>
                </div>
                <div class="fa-pull-right">
                    <button type="button" class="btn mybtn-table" :disabled="!this.isValid()" v-on:click="this.proximo" id="ativarLocalizacaoEContato">Próximo <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MaskedInput from 'vue-masked-input'
    import VeeValidate from 'vee-validate'
    export default {
        props:{
            mudaAba : Function,
            old     : Object
        },
        components:{
            MaskedInput,
            VeeValidate
        },
        watch:{
            siape   : 'passaSiape',
            crp     : 'passaCrp'
        },
        data:function(){
            return{
                siape: '',
                crp:''
            }
        },
        methods:{
            passaSiape:function(){
                if(this.validaSiape())
                    document.getElementById('crp').focus();
            },
            passaCrp:function(){
                if(this.validaCrp())
                    document.getElementById('ativarLocalizacaoEContato').focus();
            },
            validaSiape:function(){
               return /[\d]{7}/.test(this.siape);
            },
            validaCrp:function(){
               return /[\d]{2}\/[\d]{5}/.test(this.crp);
            },
            isValid:function(){
                return this.validaSiape() && this.validaCrp()
            },
            proximo:function(){
                this.mudaAba('localizacaoEContato');
            },anterior:function(){
                this.mudaAba('informacoesPessoais');
            }
        },
        mounted(){
            this.siape = this.old.siape;
            this.crp = this.old.crp;
        }
    }
</script>
