<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now createss something great!
|
*/

$this->get('/', 'PaginaInicialController@mostrarPaginaInicial')->name("pagina-inicial");
$this->get('/pedidoCadastro', 'Site\AlunoController@mostrarformularioPedidoCadastro');
$this->post('/pedidoCadastro', 'Site\AlunoController@verificarPedidoCadastro')->name('verificarPedidoCadastro');
$this->get('/realizarCadastro', 'Site\AlunoController@mostrarFormularioCadastrarAluno');
$this->post('/realizarCadastro', 'Aluno\RegistrarAlunoController@registrarAluno');
$this->get("/solicitarCadastro", 'Site\AlunoController@mostrarFormularioSolicitarCadastro')->name("solicitarCadastro");

//Auth::routes();

$this->get('/home', 'HomeController@index')->name('home');
$this->get('/gerenciarPerfil', 'DashboardAluno\HomeController@mostrarPaginaGerenciarPerfil')->name('gerenciarPerfil');
$this->get('/marcarAtendimento', 'DashboardAluno\HomeController@mostrarPaginaMarcarAtendimento')->name('marcarAtendimento');

// //consulta
$this->post('/consulta', 'Site\ConsultaController@cadastrarConsulta')->name('consulta.marcar');

//Auth Routes |||||||||
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$thiges->post('login', 'Auth\LoginController@login');
$this->post('/login', 'Auth\LoginController@logar')->name('login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('/logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('passwordreset.show-link-request-form');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('passwordreset.send-reset-link');
$this->get('password/reset/{token}', 'Auth\ForgotPasswordController@resetForm')->name('passwordreset.show-form-reset');
$this->post('/redefinirSenha', 'Auth\ForgotPasswordController@redefinirSenha')->name('redefinirSenha');


//end Auth Routes

//alunos routes
$this->get('/dashboard', "DashboardAluno\HomeController@home");
$this->get('/info/{id}', "DashboardAluno\RestAlunoController@getAluno")->middleware('auth');
$this->get('/psicologos', "DashboardAluno\RestAlunoController@psicologos")->middleware('auth');
$this->get('/psicologo/get', "DashboardAluno\RestAlunoController@horariopsico")->middleware('auth');
$this->get('/atendimentos', 'DashboardAluno\AtendimentoController@mostrarAtendimentos')->middleware('auth');
$this->post('/atendimentos', 'DashboardAluno\AtendimentoController@salvarAtendimento')->middleware('auth');
$this->post('/atendimentos/cancelar', 'DashboardAluno\AtendimentoController@cancelarAtendimento')->middleware('auth');
$this->get('/atendimentos/detalhes/{id}', 'DashboardAluno\AtendimentoController@mostrarDetalhes')->middleware('auth');

//rotas do psicologo
$this->get('/consultasPsicologo', 'Dashboard\ConsultaController@listarAtendimentos')->name('consultas.all')->middleware('auth');
$this->get('/consulta', 'Dashboard\ConsultaController@mostarPaginaConsultas')->name('consultas.all')->middleware('auth');
$this->get('/consulta/{id}', 'Dashboard\ConsultaController@verConsulta')->name('consulta.visualizar')->middleware('auth');
$this->get('/atendimento/{id}', 'Dashboard\AtendimentoController@mostrarAtendimentos')->name('atendimeto.get')->middleware('auth')->middleware('funcionario');
$this->patch('/atendimento/status', 'Dashboard\ConsultaController@atualizarStatusAtendimento')->middleware('auth')->middleware('funcionario');
$this->post('/observacao', 'Dashboard\ObservacoesController@adicionarObservacao')->middleware('auth')->middleware('funcionario');
$this->get('/observacao/{id}', 'Dashboard\ObservacoesController@mostrarObservacoesAtendimento')->name('observacaoAtendimento')->middleware('auth')->middleware('funcionario');
$this->post('/observacao/apagar', 'Dashboard\ObservacoesController@apagarObservacaoAtendimento')->middleware('auth')->middleware('funcionario');

//gerenciamento de usuarios
$this->get('/users', 'Dashboard\UsersController@usuarios')->name('usuarios.all')->middleware('auth');
$this->get('/users/create', 'Dashboard\UsersController@formularioCriarUsuarios')->name('usuarios.create')->middleware('auth');
$this->get('/users/edit/{id}', 'Dashboard\UsersController@formularioEditarUsuario')->name('usuarios.edit')->middleware('auth');
$this->post('/users/edit/{tipo}', 'Dashboard\UsersController@atualizaUsuario')->name('usuarios.editTipo')->middleware('auth');
$this->post('/users/createFuncionario', 'Funcionario\RegistrarFuncionarioController@registrarFuncionario')->name('usuarios.createFuncionario')->middleware('auth');

//gerenciamento de cursos
$this->get('/cursos', 'Dashboard\CursoController@mostrarPaginaCursos')->name('cursos.all')->middleware('auth');
$this->get('/cursos/get', 'Dashboard\CursoController@getCursos')->middleware('auth');
$this->post('/cursos/create', 'Dashboard\CursoController@createCurso')->middleware('auth');
$this->post('/cursos/alter', 'Dashboard\CursoController@alterCurso')->name('curso.alterar')->middleware('auth');

//gerenciamento de horarios
$this->get('/horarios', 'Dashboard\ManterHorariosController@mostrarPaginaManterHorarios')->name('horario')->middleware('auth')->middleware('funcionario');
$this->get('/horarios/{ano}/{numeroSemana}', 'Dashboard\ManterHorariosController@carregarSemana')->middleware('funcionario');
$this->post('/horarios/{ano}/{numeroSemana}', "Dashboard\ManterHorariosController@salvarSemana")->middleware('funcionario');

//Localizacao Routes
$this->get('/paises', 'Site\LocalizacaoController@pais');
$this->get('/estados/{idPais}', 'Site\LocalizacaoController@estados');
$this->get('/cidades/{idEstado}', 'Site\LocalizacaoController@cidades');

//localizacao auth
$this->get('/localizacao', 'Dashboard\LocalizacaoController@localizacao');

//rota de redefinir nova senha

//rota de listar os alunos
$this->get('/alunos', 'Dashboard\AlunoController@mostrarPaginaAlunos')->name('alunos.all')->middleware('auth');
$this->get('/alunos/get', 'Dashboard\AlunoController@listarAlunos')->middleware('auth')->middleware('funcionario');
$this->get('/alunos/{id}', 'Dashboard\AlunoController@getAluno')->middleware('auth')->middleware('funcionario');
// $this->get('/aluno/{id}', "Dashboard\AlunoController@mostrarPerfilAluno")->middleware('auth')->middleware('funcionario')->name('aluno.buscar');
$this->post('/aluno/pessoal', "Dashboard\AlunoController@editAlunoPessoal")->middleware('auth')->middleware('funcionario')->name('aluno.pessoal');
$this->post('/aluno/academico', "Dashboard\AlunoController@editAlunoAcademico")->middleware('auth')->middleware('funcionario')->name('aluno.academico');
$this->post('/aluno/contato', "Dashboard\AlunoController@editAlunoContato")->middleware('auth')->middleware('funcionario')->name('aluno.contato');
$this->post('aluno/observacao-aluno/{id}', "Dashboard\AlunoController@addObsercacaoAluno")->middleware('funcionario');

$this->get('/manter-semestre', 'Dashboard\ManterSemestreController@mostrarPaginaSemestre')->name("semestre.all");

$this->get('/semestres', 'Dashboard\ManterSemestreController@index');
$this->post('/semestres', 'Dashboard\ManterSemestreController@create');


$this->get('/manter-informacoes', 'DashboardAluno\InformacoesController@manterInformacoesSemestre');
$this->post('/manter-informacoes', 'DashboardAluno\InformacoesController@atualizarInfoSemestre');


$this->options('{any}', function () {
    return response('OK', \Illuminate\Http\Response::HTTP_NO_CONTENT)
        ->header('Access-Control-Allow-Origin', implode(',', config('cors.default_profile.allow_origins')))
        ->header('Access-Control-Allow-Methods', implode(',', config('cors.default_profile.allow_methods')))
        ->header('Access-Control-Allow-Headers', implode(',', config('cors.default_profile.allow_headers')));
});


$this->get('/mail', function () {
    $email = new App\Mail\SendMailPsicologo([]);
    Mail::to('guikar741lol@gmail.com')->send($email);

    // return view('mail.exemplo');
    $markdown = new \Illuminate\Mail\Markdown(view(), [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ]
    ]);

    return $markdown->render('mail.novo-atendimento', [
        'user' => 'Guilherme N'
    ]);
});
