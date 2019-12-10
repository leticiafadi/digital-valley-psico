<template>
  <div class="row">
    <div class="col col-12 col-lg-3 text-center">
      <button
        class="btn btn-circle btn-xl"
        :class="{'btn-primary' : aba == 'informacoesPessoais', 'btn-outline-primary' : aba != 'informacoesPessoais' }"
        type="button"
      >
        <i
          class="fas fa-user"
          :class="{'btn-primary' : aba == 'informacoesPessoais', 'btn-outline-primary' : aba != 'informacoesPessoais' }"
        ></i>
      </button>
      <div>Informações pessoais</div>
    </div>
    <div class="col col-12 col-lg-3 text-center">
      <button
        class="btn btn-circle btn-xl"
        :class="{'btn-primary' : aba == 'informacoesUniversitarias', 'btn-outline-primary' : aba != 'informacoesUniversitarias' }"
        type="button"
        :disabled="!aba == 'informacoesProfissionais'"
      >
        <i
          class="fas fa-user-graduate"
          :class="{'btn-primary' : aba == 'informacoesUniversitarias', 'btn-outline-primary' : aba != 'informacoesUniversitarias' }"
        ></i>
      </button>
      <div>Informações acadêmicas</div>
    </div>
    <div class="col col-12 col-lg-3 text-center">
      <button
        class="btn btn-circle btn-xl"
        type="button"
        :class="{'btn-primary' : aba == 'localizacaoEContato', 'btn-outline-primary' : aba != 'localizacaoEContato' }"
      >
        <i
          class="fas fa-map-marked-alt"
          :class="{'btn-primary' : aba == 'localizacaoEContato', 'btn-outline-primary' : aba != 'localizacaoEContato' }"
        ></i>
      </button>
      <div>Localização e contato</div>
    </div>
    <div class="col col-12 col-lg-3 text-center">
      <button
        class="btn btn-circle btn-xl"
        type="button"
        :class="{'btn-primary' : aba == 'dadosDeConta', 'btn-outline-primary' : aba != 'dadosDeConta' }"
      >
        <i
          class="fas fa-lock"
          :class="{'btn-primary' : aba == 'dadosDeConta', 'btn-outline-primary' : aba != 'dadosDeConta' }"
        ></i>
      </button>
      <div>Dados confidenciais</div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    aba: String
  },
  data: function() {
    return {};
  }
};
</script>