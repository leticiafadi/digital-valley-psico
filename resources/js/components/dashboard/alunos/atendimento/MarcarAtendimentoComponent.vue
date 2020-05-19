<template>
  <div class="container">
    <div class="row">
      <div class="col col-12">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-fw fa-calendar mycolor-azul"></i>
            Marcar atendimento
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col col-12">
                <div class="form-group">
                  <label for="motivoAtendimento">Motivo do atendimento</label>
                  <input
                    type="text"
                    name="motivoAtendimento"
                    v-model="motivoAtendimento"
                    placeholder="EX: Não estou conseguindo conciliar os meus horários da faculdade"
                  />
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="id_curso">Psicólogo responsável</label>
                  <select v-model="idPsico" name="id_curso" class="form-control">
                    <option :value="0" selected>Selecione um psicólogo</option>
                    <option
                      v-for="psicologoItr in psicologos"
                      v-bind:value="psicologoItr.id"
                      :key="psicologoItr.id"
                    >{{psicologoItr.nome_completo}}</option>
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="id_semana">Semana Disponivel</label>
                  <select v-model="nrsemana" name="id_semana" class="form-control">
                    <option :value="0" selected>Selecione uma Semana Disponível</option>
                    <option
                      v-for="semana_itr in semanas"
                      v-bind:value="semana_itr.numeroSemana"
                      :key="semana_itr.numeroSemana"
                    >Semana {{semana_itr.numeroSemana}} de {{formatarData(semana_itr.inicio)}} até {{formatarData(semana_itr.final)}}</option>
                  </select>
                </div>
              </div>
            </div>
            <div v-if="this.idPsico!=0 && this.nrsemana!=0 && this.dias.length > 0">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="mt-4 mb-4"></div>
                <div class="table-responsive">
                  *Os horários desabilitados não estão disponíveis
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Horas/Dias</th>
                        <th v-for="(diaItr, idz) in dias" :key="idz">{{formatarDiaSemana(diaItr)}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="6">
                          <div class="text-center">Manhã</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">08:00 - 09:00</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_a_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_a_id, this.semana.segunda.segunda_a_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_a_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_a_id, this.semana.terca.terca_a_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_a_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_a_id, this.semana.quarta.quarta_a_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_a_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_a_id, this.semana.quinta.quinta_a_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_a_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_a_id, this.semana.sexta.sexta_a_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">09:00 - 10:00</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_b_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_b_id, this.semana.segunda.segunda_b_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_b_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_b_id, this.semana.terca.terca_b_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_b_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_b_id, this.semana.quarta.quarta_b_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_b_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_b_id, this.semana.quinta.quinta_b_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_b_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_b_id, this.semana.sexta.sexta_b_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">10:00 - 11:00</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_c_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_c_id, this.semana.segunda.segunda_c_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_c_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_c_id, this.semana.terca.terca_c_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_c_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_c_id, this.semana.quarta.quarta_c_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_c_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_c_id, this.semana.quinta.quinta_c_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_c_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_c_id, this.semana.sexta.sexta_c_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">11:00 - 12:00</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_d_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_d_id, this.semana.segunda.segunda_d_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_d_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_d_id, this.semana.terca.terca_d_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_d_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_d_id, this.semana.quarta.quarta_d_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_d_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_d_id, this.semana.quinta.quinta_d_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_d_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_d_id, this.semana.sexta.sexta_d_bool.value)"
                          />
                        </td>
                      </tr>

                      <tr>
                        <td colspan="6">
                          <div class="text-center">Tarde</div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">13:30 - 14:30</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_e_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_e_id, this.semana.segunda.segunda_e_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_e_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_e_id, this.semana.terca.terca_e_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_e_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_e_id, this.semana.quarta.quarta_e_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_e_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_e_id, this.semana.quinta.quinta_e_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_e_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_e_id, this.semana.sexta.sexta_e_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">14:30 - 15:30</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_f_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_f_id, this.semana.segunda.segunda_f_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_f_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_f_id, this.semana.terca.terca_f_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_f_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_f_id, this.semana.quarta.quarta_f_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_f_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_f_id, this.semana.quinta.quinta_f_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_f_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_f_id, this.semana.sexta.sexta_f_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">15:30 - 16:30</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_g_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_g_id, this.semana.segunda.segunda_g_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_g_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_g_id, this.semana.terca.terca_g_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_g_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_g_id, this.semana.quarta.quarta_g_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_g_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_g_id, this.semana.quinta.quinta_g_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_g_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_g_id, this.semana.sexta.sexta_g_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">16:30 - 17:30</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_h_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_h_id, this.semana.segunda.segunda_h_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_h_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_h_id, this.semana.terca.terca_h_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_h_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_h_id, this.semana.quarta.quarta_h_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_h_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_h_id, this.semana.quinta.quinta_h_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_h_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_h_id, this.semana.sexta.sexta_h_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">17:30 - 18:30</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_i_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_i_id, this.semana.segunda.segunda_i_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_i_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_i_id, this.semana.terca.terca_i_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_i_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_i_id, this.semana.quarta.quarta_i_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_i_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_i_id, this.semana.quinta.quinta_i_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_i_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_i_id, this.semana.sexta.sexta_i_bool.value)"
                          />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="text-center text-bold">18:30 - 19:30</div>
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.segunda.segunda_j_bool)"
                            id
                            :disabled="desativar(this.semana.segunda.segunda_j_id, this.semana.segunda.segunda_j_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.terca.terca_j_bool)"
                            id
                            :disabled="desativar(this.semana.terca.terca_j_id, this.semana.terca.terca_j_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quarta.quarta_j_bool)"
                            id
                            :disabled="desativar(this.semana.quarta.quarta_j_id, this.semana.quarta.quarta_j_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.quinta.quinta_j_bool)"
                            id
                            :disabled="desativar(this.semana.quinta.quinta_j_id, this.semana.quinta.quinta_j_bool.value)"
                          />
                        </td>
                        <td>
                          <input
                            type="checkbox"
                            @click="desativa(semana.sexta.sexta_j_bool)"
                            id
                            :disabled="desativar(this.semana.sexta.sexta_j_id, this.semana.sexta.sexta_j_bool.value)"
                          />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="horarios-atendimento">Encaminhado por</label>
                  <select
                    name="formaEncaminhamento"
                    id
                    class="form-control"
                    v-model="motivoEncaminhamento"
                  >
                    <option @click="limpaMotivo()" value>Selecione a forma de encaminhamento</option>
                    <option value="espontaneo">Espontânea vontade</option>
                    <option value="recomendado">Outro motivo</option>
                  </select>
                </div>
              </div>
              <div
                class="col-xl-8 col-lg-8 col-md-12 col-sm-12"
                v-show="motivoEncaminhamento == 'recomendado'"
              >
                <div class="form-group">
                  <label for="motivoEncaminhamento">Descreva quem o encaminhou</label>
                  <input
                    type="text"
                    name="motivoEncaminhamento"
                    placeholder="EX: encaminhado pela psicóloga"
                    v-model="textMotivoEncaminhamento"
                  />
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col col-12">
                <div class="fa-pull-right">
                  <button
                    type="submit"
                    @click="salvarHorario"
                    class="btn mybtn-table btn-lg"
                  >Marcar atendimento</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueCalendar from "vuejs-datepicker";
import { en, ptBR } from "vuejs-datepicker/dist/locale";
import { Datetime } from "vue-datetime";
import Moment from "moment";
export default {
  components: {
    VueCalendar,
    ptBR,
    Datetime
  },
  props: {},
  data: function() {
    return {
      pt: ptBR,
      dataAtendimento: "",
      dias: [],
      motivoAtendimento: "",
      motivoEncaminhamento: "",
      textMotivoEncaminhamento: "",
      psicologos: [],
      idPsico: 0,
      semanas: [],
      nrsemana: 0,
      desativarTodos: false,
      semana: {
        segunda: {
          segunda_a_id: 0,
          segunda_b_id: 0,
          segunda_c_id: 0,
          segunda_d_id: 0,
          segunda_e_id: 0,
          segunda_f_id: 0,
          segunda_g_id: 0,
          segunda_h_id: 0,
          segunda_i_id: 0,
          segunda_j_id: 0,

          segunda_a_bool: { value: false },
          segunda_b_bool: { value: false },
          segunda_c_bool: { value: false },
          segunda_d_bool: { value: false },
          segunda_e_bool: { value: false },
          segunda_f_bool: { value: false },
          segunda_g_bool: { value: false },
          segunda_h_bool: { value: false },
          segunda_i_bool: { value: false },
          segunda_j_bool: { value: false }
        },
        terca: {
          terca_a_id: 0,
          terca_b_id: 0,
          terca_c_id: 0,
          terca_d_id: 0,
          terca_e_id: 0,
          terca_f_id: 0,
          terca_g_id: 0,
          terca_h_id: 0,
          terca_i_id: 0,
          terca_j_id: 0,

          terca_a_bool: { value: false },
          terca_b_bool: { value: false },
          terca_c_bool: { value: false },
          terca_d_bool: { value: false },
          terca_e_bool: { value: false },
          terca_f_bool: { value: false },
          terca_g_bool: { value: false },
          terca_h_bool: { value: false },
          terca_i_bool: { value: false },
          terca_j_bool: { value: false }
        },
        quarta: {
          quarta_a_id: 0,
          quarta_b_id: 0,
          quarta_c_id: 0,
          quarta_d_id: 0,
          quarta_e_id: 0,
          quarta_f_id: 0,
          quarta_g_id: 0,
          quarta_h_id: 0,
          quarta_i_id: 0,
          quarta_j_id: 0,

          quarta_a_bool: { value: false },
          quarta_b_bool: { value: false },
          quarta_c_bool: { value: false },
          quarta_d_bool: { value: false },
          quarta_e_bool: { value: false },
          quarta_f_bool: { value: false },
          quarta_g_bool: { value: false },
          quarta_h_bool: { value: false },
          quarta_i_bool: { value: false },
          quarta_j_bool: { value: false }
        },
        quinta: {
          quinta_a_id: 0,
          quinta_b_id: 0,
          quinta_c_id: 0,
          quinta_d_id: 0,
          quinta_e_id: 0,
          quinta_f_id: 0,
          quinta_g_id: 0,
          quinta_h_id: 0,
          quinta_i_id: 0,
          quinta_j_id: 0,

          quinta_a_bool: { value: false },
          quinta_b_bool: { value: false },
          quinta_c_bool: { value: false },
          quinta_d_bool: { value: false },
          quinta_e_bool: { value: false },
          quinta_f_bool: { value: false },
          quinta_g_bool: { value: false },
          quinta_h_bool: { value: false },
          quinta_i_bool: { value: false },
          quinta_j_bool: { value: false }
        },
        sexta: {
          sexta_a_id: 0,
          sexta_b_id: 0,
          sexta_c_id: 0,
          sexta_d_id: 0,
          sexta_e_id: 0,
          sexta_f_id: 0,
          sexta_g_id: 0,
          sexta_h_id: 0,
          sexta_i_id: 0,
          sexta_j_id: 0,

          sexta_a_bool: { value: false },
          sexta_b_bool: { value: false },
          sexta_c_bool: { value: false },
          sexta_d_bool: { value: false },
          sexta_e_bool: { value: false },
          sexta_f_bool: { value: false },
          sexta_g_bool: { value: false },
          sexta_h_bool: { value: false },
          sexta_i_bool: { value: false },
          sexta_j_bool: { value: false }
        }
      }
    };
  },
  watch: {
    nrsemana: "carregaHorario"
  },
  methods: {
    carregaHorario() {
      if (this.idPsico != 0) {
        this.$http
          .get(`/psicologo/get?query=${this.nrsemana}&id=${this.idPsico}`)
          .then(response => {
            this.dias = response.data;
            if (this.dias.length == 0)
              this.$toast("info", "Não tem nenhum horario disponível");
            else this.setarSemana();
          })
          .catch(err => {
            this.dias = [];
            this.$toast("warning", "Não foi possível buscar os horarios");
          });
      }
    },
    carregasemana() {
      var dia = new Date();

      const tamanhoDia = 1000 * 60 * 60 * 24;

      while (Moment(dia).format("dddd") != "Monday") {
        dia = new Date(dia.getTime() - tamanhoDia);
      }
      while (dia < new Date(new Date().getTime() + tamanhoDia * 20)) {
        this.semanas.push({
          numeroSemana: Moment(dia).format("W"),
          inicio: dia,
          final: new Date(dia.getTime() + tamanhoDia * 4)
        });
        dia = new Date(dia.getTime() + tamanhoDia * 7);
      }
    },
    formatarData: function(date) {
      return Moment(date).format("  DD/MM  ");
    },
    formatarDiaSemana: function(date) {
      //formata o dia que aparece na tabela
      return Moment(date.dia)
        .locale("pt-br")
        .format(" ddd DD/MM  ");
    },
    setarSemana: function() {
      this.semana.segunda.segunda_a_id = this.dias[0].horarios[0];
      this.semana.segunda.segunda_b_id = this.dias[0].horarios[1];
      this.semana.segunda.segunda_c_id = this.dias[0].horarios[2];
      this.semana.segunda.segunda_d_id = this.dias[0].horarios[3];
      this.semana.segunda.segunda_e_id = this.dias[0].horarios[4];
      this.semana.segunda.segunda_f_id = this.dias[0].horarios[5];
      this.semana.segunda.segunda_g_id = this.dias[0].horarios[6];
      this.semana.segunda.segunda_h_id = this.dias[0].horarios[7];
      this.semana.segunda.segunda_i_id = this.dias[0].horarios[8];
      this.semana.segunda.segunda_j_id = this.dias[0].horarios[9];

      this.semana.terca.terca_a_id = this.dias[1].horarios[0];
      this.semana.terca.terca_b_id = this.dias[1].horarios[1];
      this.semana.terca.terca_c_id = this.dias[1].horarios[2];
      this.semana.terca.terca_d_id = this.dias[1].horarios[3];
      this.semana.terca.terca_e_id = this.dias[1].horarios[4];
      this.semana.terca.terca_f_id = this.dias[1].horarios[5];
      this.semana.terca.terca_g_id = this.dias[1].horarios[6];
      this.semana.terca.terca_h_id = this.dias[1].horarios[7];
      this.semana.terca.terca_i_id = this.dias[1].horarios[8];
      this.semana.terca.terca_j_id = this.dias[1].horarios[9];

      this.semana.quarta.quarta_a_id = this.dias[2].horarios[0];
      this.semana.quarta.quarta_b_id = this.dias[2].horarios[1];
      this.semana.quarta.quarta_c_id = this.dias[2].horarios[2];
      this.semana.quarta.quarta_d_id = this.dias[2].horarios[3];
      this.semana.quarta.quarta_e_id = this.dias[2].horarios[4];
      this.semana.quarta.quarta_f_id = this.dias[2].horarios[5];
      this.semana.quarta.quarta_g_id = this.dias[2].horarios[6];
      this.semana.quarta.quarta_h_id = this.dias[2].horarios[7];
      this.semana.quarta.quarta_i_id = this.dias[2].horarios[8];
      this.semana.quarta.quarta_j_id = this.dias[2].horarios[9];

      this.semana.quinta.quinta_a_id = this.dias[3].horarios[0];
      this.semana.quinta.quinta_b_id = this.dias[3].horarios[1];
      this.semana.quinta.quinta_c_id = this.dias[3].horarios[2];
      this.semana.quinta.quinta_d_id = this.dias[3].horarios[3];
      this.semana.quinta.quinta_e_id = this.dias[3].horarios[4];
      this.semana.quinta.quinta_f_id = this.dias[3].horarios[5];
      this.semana.quinta.quinta_g_id = this.dias[3].horarios[6];
      this.semana.quinta.quinta_h_id = this.dias[3].horarios[7];
      this.semana.quinta.quinta_i_id = this.dias[3].horarios[8];
      this.semana.quinta.quinta_j_id = this.dias[3].horarios[9];

      this.semana.sexta.sexta_a_id = this.dias[4].horarios[0];
      this.semana.sexta.sexta_b_id = this.dias[4].horarios[1];
      this.semana.sexta.sexta_c_id = this.dias[4].horarios[2];
      this.semana.sexta.sexta_d_id = this.dias[4].horarios[3];
      this.semana.sexta.sexta_e_id = this.dias[4].horarios[4];
      this.semana.sexta.sexta_f_id = this.dias[4].horarios[5];
      this.semana.sexta.sexta_g_id = this.dias[4].horarios[6];
      this.semana.sexta.sexta_h_id = this.dias[4].horarios[7];
      this.semana.sexta.sexta_i_id = this.dias[4].horarios[8];
      this.semana.sexta.sexta_j_id = this.dias[4].horarios[9];
    },
    salvarHorario() {
      // console.log(this);
      // console.log(this.semana['segunda']);
      let id;
      for (let i in this.semana) {
        for (let j in this.semana[i]) {
          if (j.includes("_bool") && this.semana[i][j].value)
            id = this.semana[i][j.split("_bool")[0] + "_id"];
        }
      }
      this.$http
        .post(`/atendimentos`, {
          _token: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
          id_horario: id,
          id_psicologo: this.idPsico,
          motivo: this.motivoAtendimento,
          encaminhamento:
            this.motivoEncaminhamento == "recomendado"
              ? this.textMotivoEncaminhamento
              : this.motivoEncaminhamento
        })
        .then(res => {
          this.$toast("success", "Atendimento Marcado com sucesso.");
          // setTimeout(() => (window.location.href = "/"), 1000);
        })
        .catch(err => {
          this.$toast("error", "Erro ao marcar atendimento");
        });
    },
    limpaMotivo() {
      this.textMotivoEncaminhamento = "";
    },
    carregaPsicologos() {
      this.$http.get(`/psicologos`).then(response => {
        this.psicologos = response.data;
      });
    },
    desativa(bool) {
      bool.value = !bool.value;
      this.desativarTodos = !this.desativarTodos;
    },
    desativar(id, bool) {
      // this.desativa();
      if (bool) {
        return false;
      } else if (this.desativarTodos || !id) {
        return true;
      } else {
        return false;
      }
      // return bool ? false :  ? true : false;
    }
  },
  mounted() {
    this.carregaPsicologos();
    this.carregasemana();
  }
};
</script>

<style>
#data-atendimento {
  padding: 5px;
  width: 100%;
}

input {
  width: 100%;
  padding: 5px;
}
</style>