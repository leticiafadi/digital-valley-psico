<template>
    <!--<i class="fas" :class="[passwordIcon]" @click="hidePassword = !hidePassword"></i>-->
    <!--<input :type="passwordType" id="password" placeholder="Senha">-->
    

                    <div >
                        
                            
                            <input :name="nome" class="form-control" :type="hidePassword" id="password" placeholder="Senha"> 
                            <i class="btn-show-pass" :class="{'far fa-eye':hidePassword=='password','far fa-eye-slash':hidePassword=='text'}" @click="()=>{hidePassword=hidePassword=='text'?'password':'text'}"></i>           
                        
                    </div>
                
</template>
<script>


export default {
    props:{
        nome: String,
        className: String
    },
    data: function() {
        return {
            hidePassword : 'password'
        }
    }
}
</script>
<style>
.btn-show-pass {
  font-size: 15px;
  color: #999999;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  position: absolute;
  height: 100%;
  top: 0;
  right: 20px;
  padding: 0 5px;
  cursor: pointer;
}

.btn-show-pass:hover {
  color: #57b846;
}

.btn-show-pass.active {
  color: #57b846;
}

</style>