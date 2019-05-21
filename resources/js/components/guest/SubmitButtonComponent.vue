<template>
  <vue-recaptcha sitekey="6LfSyKMUAAAAAFcXJ6lTEyANHbLAM6_w4ZuYgUcL" :verify="this.testa" >
    
  </vue-recaptcha>
</template>

<script>
  import VueRecaptcha from 'vue-recaptcha';
  export default {
    components: {
       VueRecaptcha 
	}, 
	methods:{
		testa:function(){
			window.alert("djfjfa");
		}
	}
  };
</script>
