<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas de renderização das views do sistema.
Route::get('/', 'FrontController@inicio')->name('inicio');

Route::get('/buscar-imoveis', 'FrontController@buscarImoveis')->name('buscar-imoveis');

Route::get('/contato', 'FrontController@contato')->name('contato');

Route::get('/imovel-selecionado/{id}', 'FrontController@mostrar')->name('ap-imovel');

Route::get('/envio-email', 'FrontController@enviarEmail')->name('envia-email');






// ** Rotas da administração do sistema. **
Route::get('/055834521/administrator/login', function (){
    return view('login-adm');
})->name('login-adm');

//Rota de tratamento de dados.
Route::post('/login', 'AuthController@login')->name('login');

//Middleware após autenticado.
Route::group(['middleware' => ['auth']], function () {

    //Rota após logado.
    Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');


    //Rotas gerais de usuário.
    Route::get('/novo-usuario', function (){
        return view('login.Usuarios.novo-usuario');
    })->name('novo-usuario');

    Route::get('/usuarios', 'UserController@usuarios_lista')->name('usuarios');

    //Rota de salvamento de novo usuário.
    Route::post('/save-user', 'UserController@cadastrar_usuario')->name('save-user');

    //Rota do crud de usuários
    Route::resource('edicao', 'UserController');





    //Rotas de Funcionário.
    Route::resource('administracao', 'FuncionarioController');

    Route::get('/gerenciamento', 'FuncionarioController@gerenciamento')->name('gerenciamento');



    //Rotas de Imoveis
    Route::resource('imovel', 'ImovelController');

    Route::get('/imovel-fotos/{id}', 'ImovelController@capturarFotos')->name('imovel-fotos');

    //Rota de salvamento de imagens do imóvel.
    Route::post('store-fotos/{id}', 'ImovelController@storeFotos')->name('store-fotos');

    //Rotas de gerenciamento de imóveis.
    Route::get('/gerenciamento-imoveis', 'ImovelController@index')->name('gerenciamento-imoveis');

    Route::get('/redirecionamento', 'ImovelController@front')->name('redirecionamento');

    Route::get('pesquisa-imoveis-adm', 'ImovelController@pesquisa')->name('pesquisa-imoveis-adm');

    //Rotas de edição de imagens do imóvel.
    Route::get('update-fotos/{id}', 'ImovelController@updateFotos')->name('update-fotos');

    Route::post('new-upload/{id}', 'ImovelController@newUpload')->name('new-upload');

    Route::post('exclusao-edicao-fotos/{id}', 'ImovelController@exclusaoEdicaoFotos')->name('exclusao-edicao-fotos');

    Route::post('deletar-tudo/{id}', 'ImovelController@deletarTudo')->name('deletar-tudo');


    //Rotas de negociação.
    Route::post('/negociar/{id}', 'ImovelController@negociar')->name('negociar');

    Route::post('/fechar-negocio/{id}', 'ImovelController@fecharNegocio')->name('fechar-negocio');

    Route::get('/anexar-contrato/{id}', 'ImovelController@anexarContrato')->name('anexar-contrato');

    Route::post('/upload-contrato/{id}', 'ImovelController@uploadContrato')->name('upload-contrato');

    Route::get('/cadastro-cliente-negociacao/{id}', function ($id){
        $imovel = \App\Imovel::find($id);
       return view('login.Imoveis.negociacao-sem-cadastro', compact('imovel'));
    })->name('cadastro-cliente-negociacao');


    //Esta rota foi posta no NegocioController para evitar sobrecarga no ImovelController.
    Route::post('/negociar-cadastrar/{id}', 'NegociosController@negociarCadastrar')->name('negociar-cadastrar');



    //Rota de Negócios Fechados
    Route::get('/pesquisar', 'NegociosController@pesquisaNegocios')->name('pesquisar');

    Route::resource('/negocios_fechados', 'NegociosController');

    Route::get('/negocios_fechados/retornar/{id}', 'NegociosController@retornar')->name('negocios-retorno');

    Route::get('/download/{id}', 'NegociosController@download')->name('download');



    //Rota de Histórico
    Route::resource('historico', 'HistoricoController');

    Route::get('/buscar-em-historico', 'HistoricoController@buscar')->name('buscar-em-historico');




    //Rota de Clientes.
    Route::resource('cliente', 'ClienteController');

    Route::get('/pesquisar-cliente', 'ClienteController@busca')->name('pesquisar-cliente');




    //Rota de logout
    Route::get('/logout', function (){

       Auth::logout();

       return redirect(route('login-adm'));
    })->name('logout');
});


Route::get('/save', 'UserController@salvar');

Route::get('/teste', function (){
   return view('login.Imoveis.contrato');
});
