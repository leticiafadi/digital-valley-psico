<template>
    <div class="card-body">
        <div class="row">
            <div class="col col-12">
                <h2>Condição de vínculo com a UFC</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-4">
                <label for="possuiAuxilio">Possui auxílio</label>
                <input type="text" class="form-control" v-model="possuiAuxilio" name="possuiAuxilio">
            </div>
            <div class="col col-4">
                <label for="tipoAuxilio">Tipo de auxílio</label>
                <input type="text" class="form-control" v-model="tipoAuxilio" name="tipoAuxilio">
            </div>
            <div class="col col-4">
                <label for="periodoAuxilio">Período de auxílio</label>
                <input type="text" class="form-control" v-model="periodoAuxilio" name="periodoAuxilio">
            </div>
        </div>
        <div class="row">
            <div class="col col-4">
                <label for="possuiBolsa">Possui bolsa</label>
                <input type="text" class="form-control" v-model="possuiBolsa" name="possuiBolsa">
            </div>
            <div class="col col-4">
                <label for="tipoBolsa">Tipo de bolsa</label>
                <input type="text" class="form-control" v-model="tipoBolsa" name="tipoBolsa">
            </div>
            <div class="col col-4">
                <label for="periodoBolsa">Período de bolsa</label>
                <input type="text" class="form-control" v-model="periodoBolsa" name="periodoBolsa">
            </div>
        </div>
        <div class="row">
            <div class="col col-6">
                <label for="outros">Outros</label>
                <input type="text" class="form-control" v-model="outros" name="outros">
            </div>
            <div class="col col-6">
                <label for="periodoOutros">Período</label>
                <input type="text" class="form-control" v-model="periodoOutros" name="periodoOutros">
            </div>
        </div>
    </div>
</template>

<script>
import VueCalendar  from 'vuejs-datepicker'
import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
export default {
    components:{
            VueCalendar,
            ptBR
    },
    data: function(){
        return {
            possuiAuxilio: '',
            tipoAuxilio: '',
            periodoAuxilio: '',
            possuiBolsa: '',
            tipoBolsa: '',
            periodoBolsa: '',
            outros: '',
            periodoOutros: ''
        }
    }
}
</script>