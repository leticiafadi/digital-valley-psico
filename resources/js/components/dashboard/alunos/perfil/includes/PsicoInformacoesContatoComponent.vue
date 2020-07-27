<template>
  <div class="card-body">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <h2>Informações de Contato</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <masked-input
            mask="(11) 1111-1111"
            name="telefone"
            :class="{'is-invalid' : errors.has('telefone-residencial')}"
            class="form-control"
            v-model='telefone'
            placeholder="Digite o numero do seu Telefone"
            id="telefone"
            v-validate="'required'" />

          <span>{{errors.first('telefone')}}</span>
        </div>
      </div>
      <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="celular">Celular</label>
          <masked-input
           mask="(11) 1 1111-1111"
           name="celular"
           id="celular"
           :class="{'is-invalid' : errors.has('telefone_celular')}"
           class="form-control"
           v-model="celular"
           placeholder="Digite o numero do seu Celular"
           v-validate="'required'" />

          <span>{{errors.first('celular')}}</span>
        </div>
      </div>
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            class="form-control"
            :class="{'is-invalid' : errors.has('email')}"
            name="email"
            id="email"
            v-model="email"
            placeholder="Digite seu Email"
            v-validate="'required|email'"
          />

          <span>{{errors.first('email')}}</span>
        </div>
      </div>
    </div>
    <button
      @click='atualizar'
      type="button"
      class="btn mybtn-table py-1 px-4">Atualizar Informações de Contato</button>
  </div>
</template>

<script>
import MaskedInput  from 'vue-masked-input'
import VeeValidate  from  'vee-validate'
export default {
    components: {
      MaskedInput,
    },
    props:{
        aluno: {
            type: Object,
            required: true,
        }
    },
    created () {
        if (this.aluno) {
          for (let i in this.aluno.contatos){
            this[this.aluno.contatos[i].tipo] = this.aluno.contatos[i].contato
          }
        }
    },
    data () {
        return {
            telefone: '',
            celular: '',
            email: '',
        }
    },
    methods: {
      atualizar () {
        this.$http
          .post(`/aluno/contato`, {
              id: this.aluno.id,
              telefone: this.telefone,
              celular: this.celular,
              email: this.email,
          })
          .then(response => {
              this.$toast("success", "Informações Atualizadas!");
          })
          .catch(err => {
              this.$toast("error", "Erro ao Atualizar!");
          })
      },
    },
}
</script>

<style>
</style>