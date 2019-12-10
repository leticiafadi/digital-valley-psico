<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-calendar" aria-hidden="true"></i> Manter Semestres
          </div>
          <div class="card-body">
            <div>
              <ul class="list-group">
                <li
                  class="list-group-item"
                  v-for="semestre in semestres"
                  v-bind:key="`${semestre.ano}.${semestre.periodo}`"
                >{{`${semestre.ano}.${semestre.periodo}`}}</li>
              </ul>
            </div>
            <div>
              <form class="mt-4" v-on:submit.prevent="criarSemestre">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col col-8">
                      <div class="form-group">
                        <label for="ano">Ano</label>
                        <masked-input
                          name="ano"
                          mask="2111"
                          placeholder="Digite o ano"
                          minlength="4"
                          v-model="ano"
                        />
                      </div>
                    </div>
                    <div class="col col-4">
                      <div class="form-group">
                        <label for="periodo">Período</label>
                        <select name="periodo" class="form-control" v-model="periodo">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar dados" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Vue from "vue";
import MaskedInput from "vue-masked-input";

export default {
  data() {
    return {
      semestres: [],
      semestre: {
        ano: "",
        periodo: ""
      }
    };
  },
  components: {
    MaskedInput
  },
  methods: {
    carregaSemestres() {
      this.$http
        .get("/semestres")
        .then(res => {
          this.semestres = res.data.semestres;
        })
        .catch(err => {
          console.log(err);
        })
        .finally(() => {});
    },
    criarSemestre() {
      this.$http
        .post("/semestres", {
          ano: this.ano,
          periodo: this.periodo
        })
        .then(res => {
          this.$toast("success", "Semestre criado com sucesso");
          this.semestres.push(res.data.semestre);
        })
        .catch(err => {
          this.$toast("error", "err");
        })
        .finally(() => {
          this.ano = "";
          this.periodo = "";
        });
    }
  },
  mounted() {
    this.carregaSemestres();
  }
};
</script>
