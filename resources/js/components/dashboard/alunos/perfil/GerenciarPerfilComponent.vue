<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-fw fa-user"></i>
                        Gerenciar perfil 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-12">
                                <h2>Informações pessoais</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="nomeCompleto">Nome completo</label>
                                    <input type="text" class="form-control" name="nomeCompleto" :class="{'is-valid' : this.validaNome()}" v-model="nomeCompleto" disabled="true">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="dataNascimento">Data de nascimento</label>
                                    <input type="text" name="dataNascimento">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="naturalidade">Naturalidade</label>
                                    <input type="text" name="naturalidade" v-model="naturalidade" disabled="true">
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="estadoCivil">Estado civil</label>
                                    <input type="text" name="estadoCivil">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="possuiFilhos">Possui filhos</label>
                                    <input type="text" name="possuiFilhos">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="resideCom">Reside com</label>
                                    <input type="text" name="resideCom">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" name="endereco">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="telefoneCelular">Telefone celular</label>
                                    <input type="text" name="telefoneCelular">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="telefoneResidencial">Telefone residencial</label>
                                    <input type="text" name="telefoneResidencial">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <h2>Informações acadêmicas</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="matricula">Matricula</label>
                                    <input type="text" name="Matricula" v-model="matricula" disabled="true">
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="turno">Turno do curso</label>
                                    <input type="text" name="turno">
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="formacaoEscolar">Formação escolar básica</label>
                                    <input type="text" name="formacaoEscolar">
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="curso">Curso atual</label>
                                    <input type="text" name="curso">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="semestreIngresso">Semestre de ingresso</label>
                                    <input type="text" name="semestreIngresso">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="semestreAtual">Semestre atual</label>
                                    <input type="text" name="semestreAtual">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="formacaIngresso">Forma de ingresso</label>
                                    <input type="text" name="formaIngresso">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="cursosConcluidos">Cursos já concluidos</label>
                                    <input type="text" name="cursosConcluidos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <h2>Condição de víncolo com a UFC</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <label for="possuiAuxilio">Possui auxílio</label>
                                <input type="text" name="possuiAuxilio">
                            </div>
                            <div class="col col-4">
                                <label for="tipoAuxilio">Tipo de auxílio</label>
                                <input type="text" name="tipoAuxilio">
                            </div>
                            <div class="col col-4">
                                <label for="periodoAuxilio">Período de auxílio</label>
                                <input type="text" name="periodoAuxilio">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <label for="possuiBolsa">Possui bolsa</label>
                                <input type="text" name="possuiBolsa">
                            </div>
                            <div class="col col-4">
                                <label for="tipoBolsa">Tipo de bolsa</label>
                                <input type="text" name="tipoBolsa">
                            </div>
                            <div class="col col-4">
                                <label for="periodoBolsa">Período de bolsa</label>
                                <input type="text" name="periodoBolsa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <label for="outros">Outros</label>
                                <input type="text" name="outros">
                            </div>
                            <div class="col col-6">
                                <label for="periodoOutros">Período</label>
                                <input type="text" name="periodoOutros">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col col-12">
                                <h2>Situação no programa</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <label for="encaminhadoPor">Encaminhado por</label>
                                <input type="text" name="encaminhadoPor">
                            </div>
                            <div class="col col-6">
                                <label for="motivoEncaminhamento">Motivo do encaminhamento</label>
                                <input type="text" name="motivoEncaminhamento">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col col-12">
                                <div class="fa-pull-right">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                            Salvar
                                    </button>
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
    import VueCalendar  from 'vuejs-datepicker' 
    import {en, ptBR}   from 'vuejs-datepicker/dist/locale'
    export default {
        components:{
            VueCalendar,
            ptBR
        },
        data: function(){
            return{
                nomeCompleto: '',
                matricula: 0,
                naturalidade: ''
            }
        },
        methods:{
            carregaDados: function(){
                this.nomeCompleto = 'Humberto Cavalcante Damasceno';
                this.matricula = 385419;
                this.naturalidade = 'Morada Nova'
            },
            validaNome: function(){
                return this.nomeCompleto != ''
            }
        },
        mounted(){
            this.carregaDados();
        }
    }
</script>

