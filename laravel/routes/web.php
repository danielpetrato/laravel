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

use Illuminate\Http\Request;

//MVC - MODEL VIEW CONTROLLER

// Comandos php artisan 
// php artisan route:list - lista todas as rotas
// php artisan down - derruba o servidor
// php artisan up - sobe o servidor

//php artisan make:controller - cria um controller na app > http > controllers - pode usar admin\nomeController para criar em uma subpasta
//php artisan make:model - cria um model na pasta app - pode usar admin\nomeController para criar em uma subpasta
//AS config de acesso ao banco fica no .env
Route::get('/', function() {
    return view('welcome'); //helper
});


Route::group(['prefix' => '/'], function(){ //Criação de grupos de rotas para organização
    Route::get('/cliente/cadastrar','ClientsController@cadastrar'); // Rota apontando para o controller ClientsController na function cadastrar
    Route::get('env', function() {
        //var_dump($_ENV); //exibindo arquivo .env
        //var_dump(getenv('NOME')); //exibindo a variavel nome criada no .env
        var_dump(env('NOME','xpto')); //exibindo a variavel nome criada no .env se a variavel não existir ele coloca xpto
    });
});

Route::group(['prefix' => '/admin'], function(){//Grupo de rotas admin
    Route::group(['prefix' => '/cliente'], function(){//subGrupo de rotas cliente
        Route::get('cadastrar','ClientsController@cadastrar'); //Rota para uma pagina de administrador
    });    
});

Route::get('/for-if/{value}', function($value) {
    return view('for-if') //helper
    ->with('value', $value)
    ->with('myArray', [
        'chave1' => 'valor1',
        'chave2' => 'valor2',
        'chave3' => 'valor3'
    ]);
});

Route::get('/blade',function(){
    $nome = "Luiz Fernando";
    $variavel1 = "valor";
    $test = "Tenho valor";
    return view('teste')
    ->with('nome', $nome)
    ->with('variavel1', $variavel1)
    ->with('test', $test); // coloca valor na variavel isset no teste.blade
});

Route::get('/cliente/cadastrar', function() {
    $nome = "Luiz Fernando";
    $variavel1 = "valor";
    //metodo 1
    /*return view('cadastrar',[ 
        'nome' => $nome,
        'variavel1' => $variavel1
    ]);*/
    //return view('cadastrar',compact('nome','variavel1')); -- metodo 2
    return view('cliente.cadastrar')//metodo 3
        ->with('nome', $nome)
        ->with('variavel1', $variavel1);

});

/*Route::get('/cliente',function(){

    $csrfToken = csrf_token();//token de verificacao do laravel csrf e o campo com o token do tipo hidden
    $html = <<<HTML
<html>
<body>
    <h1>Cliente</h1>
    <form method="post" action="/cliente/cadastrar">
        <input name="_token" id="" class="btn btn-primary" type="hidden" value="$csrfToken"> 
        <input name="name" id="" class="btn btn-primary" type="text" value="">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
HTML;
    RETURN $html;

});

// Pegando informacao do formulario com Illuminate\Http\Request - 2 formas abaixo
Route::post('/cliente/cadastrar', function (Request $request) {
    echo $request->get('name');
    echo $request->name;
});

// Rota com mais de um nome
Route::get('/admin/cliente',function(){
    return "Admin - HeLLO WORD!!";
});

// Rota com echo
Route::get('/cliente-echo',function(){
    echo "Texto com echo";
});

// Rota com parametro na URL
Route::get('/produto/{name}',function($name){
    return "Produto $name";
});

// Rota com 2 ou mais parametros na URL
Route::get('/produto/{name}/{id}',function($name,$id){
    return "Produto $name - $id";
});

// Rota com 2 ou mais parametros na URL - o id e opcional por causa do ?
Route::get('/teste/{name}/{id?}',function($name,$id = 1000){
    return "Produto $name - $id";
});*/