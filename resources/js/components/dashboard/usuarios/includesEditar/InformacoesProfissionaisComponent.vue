<template>
  <div class="card-body">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <h2>Informações Profissionais</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="crp">CRP</label>
          <masked-input 
            mask="11/11111"
            name="crp"
            v-model="crp"
            placeholder="Digite seu CRP"
            :class="{'is-invalid' : errors.has('crp')}"
            v-validate="'required'"
            class="form-control"
            id="crp"/>
          <span>{{errors.first('crp')}}</span>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="siape">Siape</label>
          <masked-input
            mask="1111111"
            class="form-control"
            placeholder="Digite seu Siape"
            name="siape"
            :class="{'is-invalid' : errors.has('siape')}"
            v-validate="'required'"
            v-model="siape"
            id="siape"/>
          <span>{{errors.first('siape')}}</span>
        </div>
      </div>
    </div>
    <button
      @click='atualizar'
      type="button"
      class="btn mybtn-table py-1 px-4">Atualizar Informações Profissionais</button>
  </div>
</template>

<script>
import MaskedInput from "vue-masked-input";
import VeeValidate from "vee-validate";
export default {
  components: {
    MaskedInput
  },
  props: {
    funcionario: {
      type: Object,
      required: true,
    },
  },
  created() {
    if (this.funcionario) {
      this.crp = this.funcionario.crp;
      this.siape = this.funcionario.siape;
    }
  },
  data() {
    return {
      crp: "",
      siape: "",
    };
  },
  methods: {
    atualizar () {
      this.$http
        .post(`/users/edit/profissionais`, {
            id: this.funcionario.id,
            crp: this.crp,
            siape: this.siape,
        })
        .then(response => {
            this.$toast("success", "Informações Atualizadas!");
        })
        .catch(err => {
            this.$toast("error", "Erro ao Atualizar!");
        })
    },
  },
};
</script>

<style>
</style>