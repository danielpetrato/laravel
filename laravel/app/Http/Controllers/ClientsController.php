<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function cadastrar(){
        $nome = "Luiz Fernando";
        $variavel1 = "valor";
        //metodo 1
        /*return view('cadastrar',[ 
            'nome' => $nome,
            'variavel1' => $variavel1
        ]);*/
        //return view('cadastrar',compact('nome','variavel1')); -- metodo 2
        return view('admin.cliente.cadastrar')//metodo 3
            ->with('nome', $nome)
            ->with('variavel1', $variavel1);

    }

    public function excluir(){

    }

    public function editar(){
        
    }
}
