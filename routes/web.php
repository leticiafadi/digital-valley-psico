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

Route::get('/', 'PaginaInicialController@mostrarPaginaInicial')->name("pagina-inicial");
route::get('/pedidoCadastro', 'Site\AlunoController@mostrarformularioPedidoCadastro');
route::post('/pedidoCadastro', 'Site\AlunoController@verificarPedidoCadastro')->name('verificarPedidoCadastro');  
Route::get('/realizarCadastro', 'Site\AlunoController@mostrarFormularioCadastrarAluno');
Route::post('/realizarCadastro', 'Aluno\RegistrarAlunoController@registrarAluno');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//consulta
Route::post('/consulta', 'Site\ConsultaController@cadastrarConsulta')->name('consulta.marcar');

//Auth Routes |||||||||
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@logar')->name('login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('passwordreset.show-link-request-form'); 
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('passwordreset.send-reset-link');
Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@resetForm')->name('passwordreset.show-form-reset');
Route::post('/redefinirSenha', 'Auth\ForgotPasswordController@redefinirSenha')->name('redefinirSenha');


//end Auth Routes

//alunos routes
Route::get('/dashboard', "DashboardAluno\HomeController@home");


Route::get('/consultas', 'Dashboard\ConsultaController@mostarPaginaConsultas')->name('consultas.all')->middleware('auth');
Route::get('/consulta/{id}','Dashboard\ConsultaController@verConsulta')->name('consulta.visualizar')->middleware('auth');
Route::get('/consulta/deletar/{id}', 'Dashboard\ConsultaController@deletarConsulta')->name('consulta.excluir')->middleware('auth');

//gerenciamento de usuarios
Route::get('/users', 'Dashboard\UsersController@usuarios')->name('usuarios.all')->middleware('auth');
Route::get('/users/create', 'Dashboard\UsersController@formularioCriarUsuarios')->name('usuarios.create')->middleware('auth');
Route::post('/users/createFuncionario', 'Funcionario\RegistrarFuncionarioController@registrarFuncionario')->name('usuarios.create')->middleware('auth');

//gerenciamento de cursos
Route::get('/cursos',           'Dashboard\CursoController@mostrarPaginaCursos')->name('cursos.all')->middleware('auth');
Route::get('/cursos/get',       'Dashboard\CursoController@getCursos')->middleware('auth');
Route::post('/cursos/create',   'Dashboard\CursoController@createCurso')->middleware('auth');
route::post('/cursos/alter',    'Dashboard\CursoController@alterCurso')->name('curso.alterar')->middleware('auth');

//gerenciamento de horarios
Route::get('/horarios', 'Dashboard\ManterHorariosController@mostrarPaginaManterHorarios')->middleware('auth')->middleware('funcionario');
Route::get('/horarios/{ano}/{semana}', 'Dashboard\ManterHorariosController@carregaDatas')->middleware('auth')->middleware('funcionario');

//Localizacao Routes
Route::get('/paises', 'Site\LocalizacaoController@pais');
Route::get('/estados/{idPais}', 'Site\LocalizacaoController@estados');
Route::get('/cidades/{idEstado}', 'Site\LocalizacaoController@cidades');

//localizacao auth
Route::get('/localizacao', 'Dashboard\LocalizacaoController@localizacao');

//rota d eredefinir nova senha
    
//rota de listar os alunos
Route::get('/alunos',           'Dashboard\AlunoController@mostrarPaginaAlunos')->name('alunos.all')->middleware('auth');
Route::get('/alunos/get','Dashboard\AlunoController@getAlunos');
