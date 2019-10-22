<template>
    <div class="card-body">
        <div class="row mt-1">
            <div class="col col-12">
                <h2>Situação no programa</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-6">
                <label for="encaminhadoPor">Encaminhado por</label>
                <input type="text" class="form-control" v-model="encaminhadoPor" name="encaminhadoPor">
            </div>
            <div class="col col-6">
                <label for="motivoEncaminhamento">Motivo do encaminhamento</label>
                <input type="text" class="form-control" v-model="motivoEncaminhamento" name="motivoEncaminhamento">
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
            encaminhadoPor: '',
            motivoEncamonhamento: ''
        }
    }
}
</script>