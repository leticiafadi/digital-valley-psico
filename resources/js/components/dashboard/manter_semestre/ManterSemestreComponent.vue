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
                                <li class="list-group-item" v-for="semestre in semestres" v-bind:key="`${semestre.ano}.${semestre.periodo}`">{{`${semestre.ano}.${semestre.periodo}`}}</li>
                            </ul>
                        </div>
                        <div>
                            <form>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import Vue from 'vue'

    export default{
        data(){
            return {
                semestres: [],
                semestre:{
                    ano: '',
                    periodo: ''
                }
            }
        },
        methods: {
            carregaSemestres(){
                this.$http.get('/semestres').then(res=>{
                    this.semestres = res.data.semestres;
                }).catch(err=>{
                    console.log(err);
                }).finally(()=>{

                });
            },
            criarSemestre(){
                this.$http.post('/semestres').then(res=>{
                    this.semestres = res.data.semestres;
                }).catch(err=>{
                    console.log(err);
                }).finally(()=>{

                });
            }
        },
        mounted(){
            this.carregaSemestres();
        }
    }
</script>
