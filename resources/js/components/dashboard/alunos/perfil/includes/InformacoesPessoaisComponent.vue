<template>
    <div class="card-body">
        <div class="row">
            <div class="col col-12">
                <h2>Informações pessoais</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-4">
                <div class="form-group">
                    <label for="dataNascimento">Data de nascimento</label>
                    <input type="text" class="form-control" name="dataNascimento" v-model="dataNascimento" disabled="true">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="cidadeNatal">Cidade natal</label>
                    <input type="text" class="form-control" name="cidadeNatal" v-model="cidadeNatal" disabled="true">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="estadoNatal">Estado natal</label>
                    <input type="text" class="form-control" name="estadoNatal" v-model="estadoNatal" disabled="true">
                </div>
            </div>    
        </div>
        <!--<div class="row">
            <div class="col col-4">
                <div class="form-group">
                    <label for="estadoCivil">Estado civil</label>
                    <input type="text" class="form-control" name="estadoCivil" v-model="estadoCivil">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="possuiFilhos">Possui filhos</label>
                    <input type="text" class="form-control" v-model="possuiFilhos" name="possuiFilhos">
                </div>
            </div>
            <div class="col col-4">
                <div class="form-group">
                    <label for="resideCom">Reside com</label>
                    <input type="text" class="form-control" v-model="resideCom" name="resideCom">
                </div>
            </div>
        </div>-->
        <div class="row">
            <div class="col col-6">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" v-model="endereco" name="endereco">
                </div>
            </div>
            <div class="col col-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" v-model="email" name="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-6">
                <div class="form-group">
                    <label for="telefoneCelular">Telefone celular</label>
                    <input type="text" class="form-control" v-model="telefoneCelular" name="telefoneCelular">
                </div>
            </div>
            <div class="col col-6">
                <div class="form-group">
                    <label for="telefoneResidencial">Telefone residencial</label>
                    <input type="text" class="form-control" v-model="telefoneResidencial" name="telefoneResidencial">
                </div>
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
            nomeCompleto: '',
            dataNascimento: '',
            cidadeNatal: '',
            estadoNatal: '',
            estadoCivil: '',
            possuiFilhos: '',
            resideCom: '',
            endereco: '',
            email: '',
            telefoneCelular: '',
            telefoneResidencial: ''
        }
    },
    methods:{

    }
}
</script>

