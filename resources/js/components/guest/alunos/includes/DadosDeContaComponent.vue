<template>
    <div>
        <div>
            <div class="text-center">
                <h3>Dados confidenciais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-6 col-12">
                <div class="form-group">
                    <label for="senha">Digite sua senha</label>
                    <input type="password" class="form-control" :class="{'is-invalid' : errors.has('senha')}" placeholder="Digite a sua senha" name="senha" v-model="senha" v-validate="'required|alpha_num|min:6|max:191'" ref="senha">

                    <span>{{errors.first('senha')}}</span>

                </div>
            </div>
            <div class="col col-md-6 col-12">
                <div class="form-group">
                    <label for="repete-senha">Repita a senha</label>
                    <input type="password" class="form-control" :class="{'is-invalid' : errors.has('repete_senha')}" placeholder="Repita a sua senha" name="repete_senha" v-model="repeteSenha" v-validate="'required|min:6|confirmed:senha'">

                    <span>{{errors.first('repete_senha')}}</span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                <div class="fa fa-pull-left">
                    <button type="button" class="btn btn-primary " @click="this.anterior"> <i class="fa fa-chevron-left"></i>Anterior</button>
                </div>
                <div class="fa-pull-right">
                    <button type="submit" class="btn btn-primary btn-lg" :disabled="!this.isValid()">Cadastrar <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VeeValidate  from  'vee-validate'
    export default {
        components :{
            VeeValidate
        },
        props:{
            mudaAba:Function
        },
        data:function(){
            return{
                senha: '',
                repeteSenha:''
            }
        },
        methods:{
            validaSenha:function(){
                return this.senha.length >= 6 && !(/\ /.test(this.senha));
            },
            validaRepeteSenha:function(){
                return this.repeteSenha === this.senha;
            },
            isValid:function(){
                return this.validaSenha() && this.validaRepeteSenha()
            },
            anterior:function(){
                this.mudaAba('localizacaoEContato');
            }
        }
    }
</script>