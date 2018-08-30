<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios PDF</title>
    <style>
        .title{
            color: brown;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="title">Listado de Usuarios</h2>  
    <table border="1">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">e-mail</th>
                <th scope="col">Fecha creación</th>
                <th scope="col">Última actualización</th>
                <th scope="col">Rol</th>                                    
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usu)
                <tr>
                    <td>{{$usu->name}}</td>
                    <td>{{$usu->email}}</td>
                    <td>{{$usu->created_at}}</td>     
                    <td>{{$usu->updated_at}}</td>
                    <td>
                        @foreach($usu->roles as $rol)
                            {{$rol->display_name}}
                        @endforeach    
                    </td>                                         
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>