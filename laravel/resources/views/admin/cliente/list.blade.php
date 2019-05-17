<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Listar clientes</h1>
    <a href="/admin/client/form-cadastrar">Novo cliente</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>                     
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>                   
                    <td>{{$client->name}}</td>    
                    <td>{{$client->email}}</td>  
                    <td>
                        <a href="{{"/admin/client/{$client->id}/form-editar"}}">Editar</a>
                    </td>       
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>