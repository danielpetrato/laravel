<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{

    public function listar(){
        $clients = Client::all();
        return view('admin.cliente.list',compact('clients'));
    }

    public function formCadastrar(){
        return view('admin.cliente.create');
    }

    public function cadastrar(Request $request){
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();
        return redirect()->to('/admin/client');
    }


    public function formEditar($id){
        $client = Client::find($id);
        if(!$client){
            abort(404);
        }
        return view('admin.cliente.edit',compact('client'));
    }

    public function editar(Request $request,$id){
        $client = Client::find($id);
        if(!$client){
            abort(404);
        }
        $client->name = $request->name;//$request->get('name')
        $client->email = $request->email;
        $client->save();
        return redirect()->to('/admin/client');
    }

    /*public function cadastrar(){
        $nome = "Luiz Fernando";
        $variavel1 = "valor";
        //metodo 1
        /*return view('cadastrar',[ 
            'nome' => $nome,
            'variavel1' => $variavel1
        ]);
        //return view('cadastrar',compact('nome','variavel1')); -- metodo 2
        return view('admin.cliente.cadastrar')//metodo 3
            ->with('nome', $nome)
            ->with('variavel1', $variavel1);

    }*/

    public function excluir(Request $request,$id){
        $client = Client::find($id);
        if(!$client){
            abort(404);
        }
        $client->delete();
        return redirect()->to('/admin/client');

    }

}
