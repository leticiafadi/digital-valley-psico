<template>
    <div class="row">
        <div class="col col-12 col-lg-3 text-center">
            <button class="btn btn-circle btn-xl" v-bind:class="[aba == 'informacoesPessoais' ? 'btn-primary' : 'btn-outline-primary']" type="button">
                <i class="fa fa-user"></i>
            </button>
            <div>
                Informações pessoais
            </div>
        </div>
        <div class="col col-12 col-lg-3 text-center">
            <button class="btn btn-circle btn-xl" v-bind:class="[aba == 'informacoesProfissionais' ? 'btn-primary' : 'btn-outline-primary']" type="button" :disabled="!aba == 'informacoesProfissionais'">
                <i class="fas fa-user-graduate"></i>
            </button>
            <div>
                Informações acadêmicas
            </div>
        </div>
        <div class="col col-12 col-lg-3 text-center">
            <button class="btn btn-circle btn-xl" type="button" v-bind:class="[aba == 'localizacaoEContato' ? 'btn-primary' : 'btn-outline-primary']">
                <i class="fas fa-map-marked-alt"></i>
            </button>
            <div>
                Localização e contato
            </div>
        </div>
        <div class="col col-12 col-lg-3 text-center">
            <button class="btn btn-circle btn-xl" type="button"  v-bind:class="[aba == 'dadosConfidenciais' ? 'btn-primary' : 'btn-outline-primary']" >
                <i class="fa fa-lock"></i>
            </button>
            <div>
                Dados confidenciais
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['aba'],
        data:function(){
            return{
                
            }
        }
    }
</script>