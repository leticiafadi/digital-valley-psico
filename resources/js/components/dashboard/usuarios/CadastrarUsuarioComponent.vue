<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user "></i>
                <span>Cadastrar funcionário</span>
            </div>
            <div class="card-body">

                <cabecalho :aba=aba :mudaAba=this.mudaAba></cabecalho>

                <div id="erro-formulario">
                    
                </div>
                

                <form :action="this.baseUrl + '/users/createFuncionario'" method="POST">

                    <input type="hidden" name="_token" :value="csrf">


                    <informacoes-pessoais  :mudaAba="this.mudaAba"  v-show="this.aba == 'informacoesPessoais'" :old="this.old"/>

                    <informacoes-profissionais  :mudaAba="this.mudaAba" v-show="this.aba == 'informacoesProfissionais'" :old="this.old" />

                    <localizacao-e-contato :mudaAba="this.mudaAba" v-show="this.aba == 'localizacaoEContato'" :old="this.old" :baseUrl="this.baseUrl"/>

                    <dados-de-conta :mudaAba="this.mudaAba" v-show="this.aba == 'dadosDeConta'" :old="old"/>
                </form>

            </div>

        </div>
    </div>
</template>

<script>
    import MaskedInput              from 'vue-masked-input'
    import Cabecalho                from './includes/CabecalhoComponent.vue'
    import InformacoesPessoais      from './includes/InformacoesPessoaisComponent.vue'
    import InformacoesProfissionais from './includes/InformacoesProfissionaisComponent.vue'
    import LocalizacaoEContato      from './includes/LocalizacaoEContatoComponent.vue'
    import DadosDeConta             from './includes/DadosDeContaComponent.vue'
    export default {
        props:[
            'old',
            'baseUrl'
        ],
        components:{
            MaskedInput,
            Cabecalho,
            InformacoesPessoais,
            InformacoesProfissionais,
            LocalizacaoEContato,
            DadosDeConta
        },
        data: function(){
            return {
                aba:'',
                informacoesFormulario : '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods:{
            mudaAba:function(novaAba){
                this.aba = novaAba;
            },
        },
        mounted() {
            this.aba = 'informacoesPessoais';
        }
    }
</script>

<style>
    #erro-formulario{
        min-height:80px
    }

</style>
