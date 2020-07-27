require("./bootstrap");
const Vue = require("vue");
const VeeValidate = require("vee-validate");
const Snotify = require("vue-snotify");
const VueRouter = require("vue-router");
const VueSweetalert2 = require("vue-sweetalert2");
const axios = require("axios");

//CSS
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VeeValidate);
Vue.use(Snotify);
Vue.use(VueRouter);
Vue.use(VueSweetalert2);

Vue.prototype.$http = axios.create({
    baseURL: "http://psico.test",
});

Vue.prototype.$toast = function (tipo, mensagem) {
    Vue.swal
        .mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
        })
        .fire({
            type: tipo,
            title: mensagem,
        });
};

//Dashboard components
Vue.component(
    "lista-alunos",
    require("./components/dashboard/alunos/ListaAlunosComponent.vue").default
);

Vue.component(
    "cadastrar-usuario",
    require("./components/dashboard/usuarios/CadastrarUsuarioComponent.vue")
        .default
);
Vue.component(
    "localizacao",
    require("./components/dashboard/localizacao/LocalizacaoComponent.vue").default
);

Vue.component(
    "curso",
    require("./components/dashboard/cursos/CursoComponent.vue").default
);

Vue.component(
    "ver-calendario",
    require("./components/dashboard/consultas/VerCalendarioComponent").default
);

Vue.component(
    "aluno-router",
    require("./components/dashboard/alunos/AlunoRouterComponent.vue").default
);

Vue.component(
    "manter-horarios",
    require("./components/dashboard/manter_horarios/ManterHorariosComponent.vue")
        .default
);

Vue.component(
    "perfil-aluno",
    require("./components/dashboard/alunos/perfil/GerenciarAlunoComponent.vue")
        .default
);

Vue.component(
    "infopessoal-aluno",
    require("./components/dashboard/alunos/perfil/includes/PsicoInformacoesPessoaisComponent.vue")
        .default
);

Vue.component(
    "infoacademica-aluno",
    require("./components/dashboard/alunos/perfil/includes/PsicoInformacoesAcademicasComponent.vue")
        .default
);

//alunos components
Vue.component(
    "cadastrar-aluno",
    require("./components/guest/alunos/CadastrarAlunoComponent.vue").default
);

Vue.component(
    "marcar-atendimento",
    require("./components/dashboard/alunos/atendimento/MarcarAtendimentoComponent.vue")
        .default
);

Vue.component(
    "manter-informacoes",
    require("./components/dashboard/alunos/manter_informacoes/ManterInformacoesComponent.vue")
        .default
);

Vue.component(
    "gerenciar-perfil",
    require("./components/dashboard/alunos/perfil/GerenciarPerfilComponent.vue")
        .default
);

Vue.component(
    "gerenciar-atendimentos",
    require("./components/dashboard/alunos/atendimento/GerenciarAtendimentosComponent.vue")
        .default
);

//re-captcha
Vue.component(
    "submit-button",
    require("./components/guest/SubmitButtonComponent.vue").default
);

Vue.component(
    "mostrar-senha",
    require("./components/form/mostrarSenhaComponent.vue").default
);

Vue.component(
    "manter-semestre",
    require("./components/dashboard/manter_semestre/ManterSemestreComponent.vue")
        .default
);

const app = new Vue({
    el: "#app",
});
