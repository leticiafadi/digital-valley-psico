<template>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-map-marked "></i>
                        <span>Gerencie as localizacões do seu sistema.</span>
                    </div>
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Países</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Estados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Cidades</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="item in list"> {{item.name}} <div class="fa fa-pull-right"> </div></li>
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datatables from 'vue2-datatable-component'
export default {
    data: function(){
        return{
            paises : [],
            type : 'pais',
            list : []
        }
    },
    components:{
        
    },
    methods:{
        carregaPaises(){
            this.$http.get(`/paises`).then(response=>{
                this.paises = response.data;
                for (let i = 0; i < 20; i++) {
                    this.list.push(this.paises[i]);
                }
            });
        },
        setaPaises(posicao){
            this.list = [];
            
        }
    },
    mounted(){
        this.carregaPaises();
        
    }
}
</script>
