<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="card">
          <div class="card-header">Atualize suas informações</div>
          <div class="card-body">
            <div class="container">
              <form v-on:submit.prevent="enviarformulario">
                <div class="row">
                  <div class="col col-md-3 col-12">
                    <div class="form-group">
                      <label for>Estado Civil *</label>
                      <input
                        name="estado_civil"
                        id
                        class="form-control"
                        type="text"
                        v-model="estadoCivil"
                        placeholder="Exemplo: casado, solteiro"
                      />
                    </div>
                  </div>
                  <div
                    :class="{'col':true, 'col-md-6': resideCom != 'outros', 'col-md-3': resideCom == 'outros', 'col-12': true}"
                  >
                    <div class="form-group">
                      <label for>Com quem reside *</label>
                      <select
                        name="reside_com"
                        id
                        class="form-control"
                        type="text"
                        v-model="resideCom"
                      >
                        <option
                          v-for="i in ['sozinho', 'familiares', 'parentes', 'amigos', 'outros']"
                          :value="i"
                          :key="i"
                        >{{i}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12" v-if="resideCom == 'outros'">
                    <div class="form-group">
                      <label for>Descreva com quem reside *</label>
                      <input
                        name="reside_outros"
                        id
                        class="form-control"
                        type="text"
                        v-model="resideOutros"
                        placeholder="Descreva de forma sucinta."
                      />
                    </div>
                  </div>
                  <div class="col col-md-3 col-12">
                    <div class="form-group">
                      <label for>Formação Escolar básica *</label>
                      <select
                        name="formacao_escolar"
                        id
                        class="form-control"
                        type="text"
                        v-model="formacaoEscolar"
                        placeholder="Descreva de forma sucinta."
                      >
                        <option value="publica">Escola pública</option>
                        <option value="privada">Escola privada</option>
                        <option value="ambas">Ambas as escolas</option>
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12">
                    <div class="form-group">
                      <label for="naturalidade">Turno de curso na UFC *</label>
                      <select name="turno" id class="form-control" type="text" v-model="turno">
                        <option
                          v-for="i in ['matutino', 'vespertino', 'integral', 'noturno']"
                          :value="i"
                          :key="i"
                        >{{i}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12">
                    <div class="form-group">
                      <label for="naturalidade">Semestre atual *</label>
                      <select name="turno" id class="form-control" type="text" v-model="semestre">
                        <option
                          v-for="i in ['1° semestre', '2° Semestre', '3° Semestre', '4° Semestre', '5° Semestre', '6° Semestre', '7° Semestre', '8° Semestre', '9° Semestre', '10° Semestre ou superior']"
                          :value="i"
                          :key="i"
                        >{{i}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12">
                    <div class="form-group">
                      <label for="naturalidade">Forma de ingresso *</label>
                      <br />
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="formaIngresso"
                          type="radio"
                          id="amplo"
                          value="amplo"
                        />
                        <label class="form-check-label" for="amplo">Ampla concorrência</label>
                        <input
                          class="form-check-input"
                          v-model="formaIngresso"
                          type="radio"
                          id="cotas"
                          value="cotas"
                        />
                        <label class="form-check-label" for="cotas">Cotas</label>
                      </div>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12" v-if="formaIngresso == 'cotas'">
                    <div class="form-group">
                      <label for="naturalidade">Tipo de cotas *</label>
                      <input
                        name="reside_outros"
                        id
                        class="form-control"
                        type="text"
                        v-model="tipoCotas"
                        placeholder="Descreva de forma sucinta."
                      />
                    </div>
                  </div>
                  <div class="col col-md-6 col-12">
                    <div class="form-gorup">
                      <label for="cursosConcluidos">Cursos já concluídos</label>
                      <input
                        type="text"
                        name="cursos_concluidos"
                        id="cursosConcluidos"
                        class="form-control"
                        v-model="cursosConcluidos"
                        placeholder="Digite um ou mais cursos."
                      />
                    </div>
                  </div>
                  <div class="col col-md-6 col-12">
                    <div class="form-group">
                      <label for="cursosEmAndamento">Cursos em andamento</label>
                      <input
                        type="text"
                        name="cursos_andamento"
                        id="cursosEmAndamento"
                        class="form-control"
                        v-model="cursosEmAndamento"
                        placeholder="Digite um curso ou mais."
                      />
                    </div>
                  </div>
                  <div class="col col-md-2 col-12">
                    <div class="form-group">
                      <label for>Possui auxílio *</label>
                      <br />
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="possuiAuxilio"
                          type="radio"
                          id="possuiAuxilio"
                          value="1"
                        />
                        <label class="form-check-label" for="possuiAuxilio">Sim</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="possuiAuxilio"
                          type="radio"
                          id="naoPossuiAuxilio"
                          value="0"
                        />
                        <label class="form-check-label" for="naoPossuiAuxilio">Não</label>
                      </div>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12">
                    <div class="form-group" v-if="possuiAuxilio == 1">
                      <label for>Tipo auxílio</label>
                      <input
                        type="text"
                        name="tipo_auxilio"
                        class="form-control"
                        v-model="tipoAuxilio"
                        placeholder="Digite o tipo do auxílio."
                      />
                    </div>
                  </div>
                  <div class="col col-md-2 col-12">
                    <div class="form-group">
                      <label for>Possui bolsa *</label>
                      <br />
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="possuiBolsa"
                          type="radio"
                          id="possuiBolsa"
                          value="1"
                        />
                        <label class="form-check-label" for="possuiBolsa">Sim</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="possuiBolsa"
                          type="radio"
                          id="naoPossuiBolsa"
                          value="0"
                        />
                        <label class="form-check-label" for="naoPossuiBolsa">Não</label>
                      </div>
                    </div>
                  </div>
                  <div class="col col-md-3 col-12">
                    <div class="form-group" v-if="possuiBolsa == 1">
                      <label for>Tipo bolsa</label>
                      <input
                        type="text"
                        name="tipo_auxilio"
                        class="form-control"
                        v-model="tipoBolsa"
                        placeholder="Digite o tipo do auxílio."
                      />
                    </div>
                  </div>
                  <div class="col col-md-2 col-12">
                    <div class="form-group">
                      <label for>Possui filhos *</label>
                      <br />
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="possuiBolsa"
                          type="radio"
                          id="possuiBolsa"
                          value="1"
                        />
                        <label class="form-check-label" for="possuiBolsa">Sim</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input"
                          v-model="possuiBolsa"
                          type="radio"
                          id="naoPossuiBolsa"
                          value="0"
                        />
                        <label class="form-check-label" for="naoPossuiBolsa">Não</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col col-12">
                    <button type="submit" class="btn btn-primary float-right">Atualizar Informações</button>
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
export default {
  data() {
    return {
      estadoCivil: "",
      resideCom: "",
      resideOutros: "",
      formacaoEscolar: "",
      turno: "",
      semestre: "",
      formaIngresso: "",
      tipoCotas: "",
      cursosConcluidos: "",
      cursosEmAndamento: "",
      possuiAuxilio: "",
      tipoAuxilio: "",
      possuiBolsa: "",
      tipoBolsa: "",
      possuiFilhos: ""
    };
  },
  methods: {
    enviarformulario() {
      this.$http
        .post("/manter-informacoes", {
          estado_civil: this.estadoCivil,
          reside_com: this.resideCom,
          reside_outros: this.resideOutros,
          formacao_escolar: this.formacaoEscolar,
          turno: this.turno,
          semestre: this.semestre,
          forma_ingresso: this.formaIngresso
        })
        .then(res => {
          this.$toast("success", "Informações salvas com sucesso");
        });
    }
  }
};
</script>