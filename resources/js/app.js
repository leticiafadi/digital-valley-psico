import "./bootstrap";
import Vue, { use, prototype, swal, component } from "vue";
import VeeValidate from "vee-validate";
import Snotify from "vue-snotify";
import VueRouter from "vue-router";
import VueSweetalert2 from "vue-sweetalert2";
import { create } from "axios";

use(VeeValidate);
use(Snotify);
use(VueRouter);
use(VueSweetalert2);

prototype.$http = create({
  baseURL: "http://localhost:80"
});

prototype.$toast = function (tipo, mensagem) {
  swal
    .mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000
    })
    .fire({
      type: tipo,
      title: mensagem
    });
};

component("example-component", require("./components/Example.vue").default);
//Dashboard components
component(
  "cadastrar-usuario",
  require("./components/dashboard/usuarios/CadastrarUsuarioComponent.vue")
  .default
);
component(
  "localizacao",
  require("./components/dashboard/localizacao/LocalizacaoComponent.vue").default
);
component(
  "curso",
  require("./components/dashboard/cursos/CursoComponent.vue").default
);
component(
  "aluno",
  require("./components/dashboard/alunos/AlunoComponent.vue").default
);

component(
  "aluno-router",
  require("./components/dashboard/alunos/AlunoRouterComponent.vue").default
);

component(
  "manter-horarios",
  require("./components/dashboard/manter_horarios/ManterHorariosComponent.vue")
  .default
);
component(
  "perfil-aluno",
  require("./components/dashboard/alunos/perfil/GerenciarAlunoComponent.vue")
  .default
);
component(
  "infopessoal-aluno",
  require("./components/dashboard/alunos/perfil/includes/PsicoInformacoesPessoaisComponent.vue")
  .default
);
component(
  "infoacademica-aluno",
  require("./components/dashboard/alunos/perfil/includes/PsicoInformacoesAcademicasComponent.vue")
  .default
);

//alunos components
component(
  "cadastrar-aluno",
  require("./components/guest/alunos/CadastrarAlunoComponent.vue").default
);
component(
  "marcar-atendimento",
  require("./components/dashboard/alunos/atendimento/MarcarAtendimentoComponent.vue")
  .default
);
component(
  "manter-informacoes",
  require("./components/dashboard/alunos/manter_informacoes/ManterInformacoesComponent.vue")
  .default
);
component(
  "gerenciar-perfil",
  require("./components/dashboard/alunos/perfil/GerenciarPerfilComponent.vue")
  .default
);
component(
  "gerenciar-atendimentos",
  require("./components/dashboard/alunos/atendimento/GerenciarAtendimentosComponent.vue")
  .default
);
//re-captcha
component(
  "submit-button",
  require("./components/guest/SubmitButtonComponent.vue").default
);

component(
  "mostrar-senha",
  require("./components/form/mostrarSenhaComponent.vue").default
);

component(
  "manter-semestre",
  require("./components/dashboard/manter_semestre/ManterSemestreComponent.vue").default
)

const app = new Vue({
  el: "#app"
});