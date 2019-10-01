require('./bootstrap');
window.Vue = require('vue');
const VeeValidate = require('vee-validate');
const Snotify  = require('vue-snotify');

Vue.use(VeeValidate);
Vue.use(Snotify);


Vue.component('example-component',  require('./components/Example.vue').default);
//Dashboard components
Vue.component('cadastrar-usuario',  require('./components/dashboard/usuarios/CadastrarUsuarioComponent.vue').default);
Vue.component('localizacao',        require('./components/dashboard/localizacao/LocalizacaoComponent.vue').default);
Vue.component('curso',              require('./components/dashboard/cursos/CursoComponent.vue').default);
Vue.component('aluno',              require('./components/dashboard/alunos/AlunoComponent.vue').default);
Vue.component('manter-horarios',    require('./components/dashboard/manter_horarios/ManterHorariosComponent.vue').default);

//alunos components
Vue.component('cadastrar-aluno', require('./components/guest/alunos/CadastrarAlunoComponent.vue').default);
Vue.component('marcar-atendimento', require('./components/dashboard/alunos/atendimento/MarcarAtendimentoComponent.vue').default);
Vue.component('gerenciar-perfil', require('./components/dashboard/alunos/perfil/GerenciarPerfilComponent.vue').default);

//re-captcha
Vue.component('submit-button', require("./components/guest/SubmitButtonComponent.vue").default);

Vue.component('mostrar-senha',require("./components/form/mostrarSenhaComponent.vue").default);

const app = new Vue({
    el: '#app'
});
