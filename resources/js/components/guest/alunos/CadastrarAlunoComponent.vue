<template>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <i class="fa fa-user"></i>
                <span>&nbsp; Realize seu cadastro como aluno</span>
            </div>
            <div class="card-body">

                <form action="/realizarCadastro" method="POST">

                    <cabecalho  id="cabecalho" /> 

                    <input type="hidden" name="_token" :value="csrf">
                    
                    <informacoes-pessoais :setError="this.setError" :mudaAba="this.mudaAba"  v-show="this.aba == 'informacoesPessoais'" :old="old"/>

                    <informacoes-universitarias :cursos="cursos" :mudaAba="this.mudaAba" v-show="this.aba == 'informacoesUniversitarias'"/>

                    
                    <localizacao-e-contato  :mudaAba="this.mudaAba" v-show="this.aba == 'localizacaoEContato'" :old="old"/>

                    <dados-de-conta :mudaAba="this.mudaAba" v-show="this.aba == 'dadosDeConta'" :old="old"/>
                
                </form>
                
            </div>
        </div>
        
    </div>
</template>

<script>
    import Cabecalho                    from './includes/CabecalhoComponent.vue';
    import InformacoesPessoais          from './includes/InformacoesPessoaisComponent.vue';
    import InformacoesUniversitarias    from './includes/InformacoesUniversitariasComponent.vue';
    import LocalizacaoEContato          from './includes/LocalizacaoEContatoComponent.vue'
    import DadosDeConta                 from './includes/DadosDeContaComponent.vue';

    export default {
        props:{
            cursos: Object,
            old: Object
        },
        components:{
            Cabecalho,
            InformacoesPessoais,
            InformacoesUniversitarias,
            LocalizacaoEContato,
            DadosDeConta
        },
        data: function(){
            return {
                aba: '',
                csrf: ''
            }
        },
        methods:{
            mudaAba:function(aba){
                this.aba = aba;
            }
        },
        mounted(){
            this.aba = 'informacoesPessoais';
            this.csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
</script>

<style>
    #cabecalho{
        margin-bottom: 80px;
    }
</style>