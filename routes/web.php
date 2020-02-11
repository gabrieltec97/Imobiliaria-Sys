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
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/buscar-imoveis', function (){
   return view('buscar-imoveis');
})->name('buscar-imoveis');

Route::get('/contato', function (){
    return view('contato');
})->name('contato');






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

    Route::get('/negociar/{id}', 'ImovelController@negociar')->name('negociar');



    //Rota de Negócios Fechados
    Route::get('/pesquisar', 'NegociosController@pesquisaNegocios')->name('pesquisar');

    Route::resource('/negocios_fechados', 'NegociosController');

    Route::get('/negocios_fechados/retornar/{id}', 'NegociosController@retornar')->name('negocios-retorno');



    //Rota de Clientes.
    Route::resource('cliente', 'ClienteController');




    //Rota de logout
    Route::get('/logout', function (){

       Auth::logout();

       return redirect(route('login-adm'));
    })->name('logout');
});


Route::get('/save', 'UserController@salvar');

Route::get('/teste2333', function (){
   return view('login.Imoveis.edicao-fotos-imovel');
});
