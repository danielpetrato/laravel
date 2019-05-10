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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente',function(){
    return "HeLLO WORD!!";
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
});