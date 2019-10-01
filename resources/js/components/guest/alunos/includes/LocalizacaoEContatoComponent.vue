<template>

    <div>
        <div>
            <div class="text-center">
                <h3>Localização e contato</h3>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">País de origem*</label>
                    <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_pais'), 'is-valid': this.validaPais()}" v-model="id_pais" name="id_pais" v-validate="'required'" >
                        <option value="" selected>Selecione um pais</option>             
                        <option v-for="pais in paises" :value="pais.id">{{pais.name}}</option>
                    </select>

                    <span>{{errors.first('id_pais')}}</span>

                </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Estado de origem *</label>
                    <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_estado'), 'is-valid': this.validaEstado()}"  v-model="id_estado" name="id_estado" v-validate="'required'">          
                        <option v-for="estado in estados" :value="estado.id">{{estado.name}}</option>
                    </select>

                    <span>{{errors.first('id_estado')}}</span>

                </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cidade de origem *</label>
                    <select class="form-control" id="" :class="{'is-invalid' : errors.has('id_cidade'), 'is-valid': this.validaCidade()}"  name="id_cidade" v-model="id_cidade" v-validate="'required'">         
                        <option v-for="cidade in cidades" :value="cidade.id">{{cidade.name}}</option>
                    </select>

                    <span>{{errors.first('id_cidade')}}</span>

                </div>
            </div>
        </div>

            <div class="row">
            <div class="col col-12 col-md-6">
                <div class="form-group">
                    <label for="endereco">Endereço de origem*</label>
                    <input type="text" class="form-control" :class="{'is-invalid' : errors.has('endereco'), 'is-valid': this.validaEndereco()}"  name="endereco" id="endereco" placeholder="Ex: Rua José Cornélio, perto do bar do bita" v-model="endereco" maxlength="63" v-validate="'required|min:5'"/>
                
                    <span>{{errors.first('endereco')}}</span>

                </div>
            </div>

            <div class="col col-12 col-md-3">
                <div class="form-group">
                    <label for="numero">Número *</label>
                    <input type="text" class="form-control" :class="{'is-invalid' : errors.has('numero'), 'is-valid': this.validaNumeroPeloTamanho()}"  name="numero" id="numero" v-model="numero" placeholder="Ex: 198"  v-validate="'required|numeric'"/>

                    <span>{{errors.first('numero')}}</span>

                </div>
            </div>


            <div class="col col-12 col-md-3">
                <div class="form-group">
                    <label for="bairro">Bairro *</label>
                    <input type="text" class="form-control" :class="{'is-invalid' : errors.has('bairro'), 'is-valid': this.validaBairro()}"  name="bairro" id="bairro" placeholder="Ex: Centro" v-model="bairro" v-validate="'required|min:5'">

                    <span>{{errors.first('bairro')}}</span>

                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="">Endereço de E-mail *</label>
                    <input type="email" class="form-control" :class="{'is-invalid' : errors.has('email'), 'is-valid': this.validaEmail()}"  name="email" placeholder="Ex: etevaldo21@gmail.com" v-model="email" v-validate="'required|email'">

                    <span>{{ errors.first('email') }}</span>

                </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="telefone-celular">Telefone celular *</label>
                    <masked-input mask="(11) 1 1111 1111" name="telefone_celular" :class="{'is-invalid' : errors.has('telefone_celular'), 'is-valid': this.validaTelefoneCelular()}"  class="form-control" v-model="telefone_celular" v-validate="{required: true, regex:  /\([\d]{2}\)\ [\d]{1}\ [\d]{4}\ [\d]{4}/ }" />


                    <span>{{errors.first('telefone_celular')}}</span>


                </div>
            </div>
            <div class="col col-12 col-md-4">
                <div class="form-group">
                    <label for="">Telefone</label>
                    <masked-input mask="(11) 1111 1111" name="telefone_residencial" :class="{'is-invalid' : errors.has('telefone_residencial'), 'is-valid': this.validaTelefoneResidencial()}" class="form-control" v-model=telefone_residencial id="telefone" v-validate="{required: true, regex:  /\([\d]{2}\)\ [\d]{4}\ [\d]{4}/ }" />

                    <span>{{errors.first('telefone_residencial')}}</span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                <div class="fa fa-pull-left">
                    <button type="button" class="btn btn-primary btn-lg" @click="this.anterior"> <i class="fas fa-chevron-left"></i> Anterior</button>
                </div>
                <div class="fa-pull-right">
                    <button type="button" class="btn btn-primary btn-lg" :disabled="!this.isValid()"  @click="this.proximo" >Próximo <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    import axios        from 'axios'
    import MaskedInput  from 'vue-masked-input'
    import VeeValidate  from  'vee-validate'
    export default {
        props:{
            setError: Function,
            mudaAba : Function,
            old     : Object,
            url : String
        },
        data:function(){
            return{
                paises:[],
                estados: [],
                cidades: [],
                id_pais:0,
                id_estado:0,
                id_cidade:0,
                telefone_celular: '',
                telefone_residencial: '',
                endereco : '',
                bairro : '',
                numero: '',
                email: '',
                aux : ''
            }
        },
        watch:{
            id_pais: 'carregaEstados',
            id_estado: 'carregaCidades'
        },
        components:{
            MaskedInput,
            axios,
            VeeValidate
        },
        methods:{
            carregaPaises: function(){
                return new Promise(async (resolve, reject)=>{
                    axios.get(this.url+'/paises').then(response=>{
                        this.paises = response.data;
                        this.estados = [];
                        this.cidades = [];
                        this.id_estado = 0;
                        this.id_cidade = 0;
                        resolve();
                    });
                });
            },
            carregaEstados:function(){
                return new Promise((resolve, reject)=>{
                    axios.get(this.url + '/estados/' + this.id_pais).then(response=>{
                        this.estados = response.data;
                        this.cidades = [];
                        this.id_cidade = 0;
                        resolve();
                    });
                });
            },
            carregaCidades:function(){
                return new Promise((resolve, reject)=>{
                    axios.get( this.url + '/cidades/' + this.id_estado).then(response=>{
                        this.cidades = response.data;
                        resolve();
                    });
                });
            },
            validaPais: function(){
                return this.id_pais > 0;
            },
            validaEstado :function(){
                return this.id_estado > 0;
            },
            validaCidade:function(){
                return this.id_cidade > 0;                
            },
            validaEndereco:function(){
                return this.endereco.length >= 5;
            },
            validaBairro:function(){
                return this.bairro.length >= 5;
            },
            validaNumeroPeloTamanho(){
                return this.numero.length >= 1;
            },
            validaNumeroPeloConteudo(){
                return /^([\d]+)$/.test(this.numero);
            },
            validaEmail:function(){
                return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email)
            },
            validaTelefoneCelular:function(){
                return /\([\d]{2}\)\ [\d]{1}\ [\d]{4}\ [\d]{4}/.test(this.telefone_celular);
            },
            passaCelular:function(){
                if(/\([\d]{2}\)\ [\d]{1}\ [\d]{4}\ [\d]{4}/.test(this.telefone_celular))
                    document.getElementById('telefone').focus()
            },
            validaTelefoneResidencial:function(){
                return /\([\d]{2}\)\ [\d]{4}\ [\d]{4}/.test(this.telefone_residencial);
            },
            isValid:function(){
                return this.validaEstado() && this.validaCidade() && this.validaEndereco() && this.validaBairro() && this.validaNumeroPeloTamanho() && this.validaNumeroPeloConteudo() && this.validaEmail() && this.validaTelefoneCelular();
            },
            proximo:function(){
                this.mudaAba('dadosDeConta'); 
            },
            anterior:function(){
                this.mudaAba('informacoesUniversitarias');
            } 
        },
        async mounted(){
            await this.carregaPaises();
            this.id_pais = this.old.id_pais != '' ? this.old.id_pais : 30;

            await this.carregaEstados();
            this.id_estado = this.old.id_estado != '' ? this.old.id_estado : 517;

            await this.carregaCidades();
            this.id_cidade = this.old.id_cidade != '' ? this.old.id_cidade : 8942 ;
            
            this.endereco = this.old.endereco;
            this.bairro = this.old.bairro;
            this.numero = this.old.numero;
            this.email = this.old.email;
            this.telefone_celular = this.old.telefone_celular;
            this.telefone_residencial = this.old.telefone_residencial;
        }
    }
</script>