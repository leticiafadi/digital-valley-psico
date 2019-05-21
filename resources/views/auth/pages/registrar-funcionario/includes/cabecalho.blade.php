<div class="row">
    <div class="col col-12 col-lg-3 text-center">
        <button class="btn btn-circle btn-xl" v-bind:class="[aba == 'informacoesPessoais' ? 'btn-primary' : 'btn-outline-primary']" type="button" v-on:click="mudaAba('informacoesPessoais')">
            <i class="fa fa-user"></i>
        </button>
        <div>
            Informações pessoais
        </div>
    </div>
    <div class="col col-12 col-lg-3 text-center">
        <button class="btn btn-circle btn-xl" v-bind:class="[aba == 'informacoesProfissionais' ? 'btn-primary' : 'btn-outline-primary']" type="button" v-on:click="mudaAba('informacoesProfissionais')" :disabled="!informacoesPessoaisIsValid">
            <i class="fa fa-user-tie"></i>
        </button>
        <div>
            Informações profissionais
        </div>
    </div>
    <div class="col col-12 col-lg-3 text-center">
        <button class="btn btn-circle btn-xl" type="button" v-on:click="mudaAba('localizacaoEContato')" v-bind:class="[aba == 'localizacaoEContato' ? 'btn-primary' : 'btn-outline-primary']" :disabled="!informacoesProfissionaisIsValid">
            <i class="fas fa-map-marked-alt"></i>
        </button>
        <div>
            Localização e contato
        </div>
    </div>
    <div class="col col-12 col-lg-3 text-center">
        <button class="btn btn-circle btn-xl" type="button" v-on:click="mudaAba('dadosConfidenciais')" v-bind:class="[aba == 'dadosConfidenciais' ? 'btn-primary' : 'btn-outline-primary']" :disabled="!dadosConfidenciaisIsValid">
            <i class="fa fa-lock"></i>
        </button>
        <div>
            Dados confidenciais
        </div>
    </div>
</div>
